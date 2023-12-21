$(document).ready(function() {
    $.fxbConditions = function(el, options) {
            this.el = el;
            this.$el = $(el);
            this.options = $.extend({}, $.fxbConditions.defaultOptions, options);
    },
        $.fxbConditions.parse = function (formId) {
            var $form = $(formId);
            $form.init_formConditions();
        },

        $.extend($.fxbConditions,
            {
                defaultOptions: {
                    fieldConditions: [],
                    animate: true
                },

                helpers: {
                    normalize: function(value, preserveCase) {
                        if (value == null) {
                            return "";
                        }

                        return preserveCase ? String(value) : String(value).toLowerCase();
                    },

                    toNumber: function(value) {
                        value = Number(value);
                        return isNaN(value) ? undefined : value;
                    },

                    indexOf: function(str, value, startIndex, preserveCase) {
                        str = this.normalize(str, preserveCase);
                        value = this.normalize(value, preserveCase);

                        return str.indexOf(value, startIndex);
                    },

                    endsWith: function(str, value, preserveCase) {
                        str = this.normalize(str, preserveCase);
                        value = this.normalize(value, preserveCase);

                        var lengthDiff = str.length - value.length;
                        return lengthDiff >= 0 && str.substring(lengthDiff) === value;
                    }
                },

                actions: {
                    show: function($target) {
                        if (this.loaded && this.options.animate) {
                            if ($target.is(":hidden")) {
                                var $self = this;
                                $target.slideDown(function () {
                                    $self.setRequired($target);
                                });

                                return;
                            }
                        } else {
                            $target.show();
                        }

                        this.setRequired($target);
                    },

                    hide: function($target) {
                        if (this.loaded && this.options.animate) {
                            if ($target.is(":visible")) {
                                var $self = this;
                                $target.slideUp(function() {
                                    $self.setRequired($target);
                                });

                                return;
                            }
                        } else {
                            $target.hide();
                        }

                        this.setRequired($target);
                    },

                    enable: function($target) {
                        if ($target.is("input,select,textarea,button")) {
                            $target.prop("disabled", false);
                            this.setRequired($target);
                            $('[data-valmsg-for="' + $target.prop("name") + '"]').show();
                        }
                    },

                    disable: function($target) {
                        if ($target.is("input,select,textarea,button")) {
                            $target.prop("disabled", true);
                            this.setRequired($target);
                            $('[data-valmsg-for="' + $target.prop("name") + '"]').hide();
                        }
                    },

                    "go to page": function($target, action, conditionsResult) {
                        $target.each(function(idx, target) {
                            if (target.name &&
                                target.name.length &&
                                $(target).is("input[type='submit'], button[type='submit']")) {
                                var $nextPageEl = this.$el.find("[name=\"" + target.name + "\"][data-sc-next-page]");
                                if (!$nextPageEl.length) {
                                    if (conditionsResult && action.value) {
                                        var $currentEl = this.$el.find("[name=\"" + target.name + "\"]");
                                        $('<input>').attr({
                                            type: 'hidden',
                                            name: target.name,
                                            value: action.value,
                                            'data-sc-next-page': ""
                                        }).insertAfter($currentEl.last());
                                    }

                                    return;
                                }

                                var value = action.value;
                                if (!conditionsResult) {
                                    value = $nextPageEl.data("sc-next-page");

                                    for (var i = (this.executedActions.length - 1); i >= 0; i--) {
                                        var prevAction = this.executedActions[i];
                                        if (prevAction.fieldId === action.fieldId &&
                                            prevAction.conditionsResult &&
                                            prevAction.actionType.toLowerCase() === "go to page") {
                                            value = prevAction.value;
                                            break;
                                        }
                                    }
                                }

                                $nextPageEl.val(value);
                                $nextPageEl.prop("disabled", !value);
                            }
                        }.bind(this));
                    },

                    // action pairs used for finding the opposite action to execute when conditions are not satisfied
                    actionLinks: {
                        show: "hide",
                        enable: "disable",
                        "go to page": "go to page"
                    },

                    addAction: function(actionName, actionFn, oppositeActionName, oppositeActionFn) {
                        if (actionName && actionName.length) {
                            actionName = actionName.toLowerCase();

                            this[actionName] = actionFn;

                            if (arguments.length === 2) {
                                return;
                            }

                            if (oppositeActionName && oppositeActionName.length) {
                                oppositeActionName = oppositeActionName.toLowerCase();

                                this.actionLinks[actionName] = oppositeActionName;
                                if (arguments.length > 3) {
                                    this[oppositeActionName] = oppositeActionFn;
                                }
                            } else {
                                delete this.actionLinks[actionName];
                            }
                        }
                    },

                    getAction: function(actionName, conditionsResult) {
                        if (actionName && actionName.length) {
                            actionName = actionName.toLowerCase();

                            if (conditionsResult) {
                                return this[actionName];
                            }

                            if (this.actionLinks.hasOwnProperty(actionName)) {
                                var oppositeActionName = this.actionLinks[actionName];
                                return this[oppositeActionName];
                            } else {
                                for (var property in this.actionLinks) {
                                    if (this.actionLinks.hasOwnProperty(property) &&
                                        this.actionLinks[property] === actionName) {
                                        return this[property];
                                    }
                                }
                            }
                        }

                        return this[actionName];
                    }
                },

                operators: {
                    "contains": function(conditionValue, fieldValue) {
                        return $.fxbConditions.helpers.indexOf(fieldValue, conditionValue) >= 0;
                    },

                    "does not contain": function(conditionValue, fieldValue) {
                        return $.fxbConditions.helpers.indexOf(fieldValue, conditionValue) === -1;
                    },

                    "starts with": function(conditionValue, fieldValue) {
                        return $.fxbConditions.helpers.indexOf(fieldValue, conditionValue) === 0;
                    },

                    "does not start with": function(conditionValue, fieldValue) {
                        return $.fxbConditions.helpers.indexOf(fieldValue, conditionValue) !== 0;
                    },

                    "ends with": function(conditionValue, fieldValue) {
                        return $.fxbConditions.helpers.endsWith(fieldValue, conditionValue);
                    },

                    "does not end with": function(conditionValue, fieldValue) {
                        return !$.fxbConditions.helpers.endsWith(fieldValue, conditionValue);
                    },

                    "is equal to": function(conditionValue, fieldValue) {
                        conditionValue = $.fxbConditions.helpers.normalize(conditionValue);
                        fieldValue = $.fxbConditions.helpers.normalize(fieldValue);
                        if (fieldValue === conditionValue) {
                            return true;
                        }

                        if (conditionValue.length) {
                            var left = $.fxbConditions.helpers.toNumber(conditionValue);
                            if (typeof left === "number") {
                                var right = $.fxbConditions.helpers.toNumber(fieldValue);
                                return typeof right === "number" && left === right;
                            }
                        }

                        return false;
                    },

                    "is not equal to": function(conditionValue, fieldValue) {
                        conditionValue = $.fxbConditions.helpers.normalize(conditionValue);
                        fieldValue = $.fxbConditions.helpers.normalize(fieldValue);
                        if (fieldValue === conditionValue) {
                            return false;
                        }

                        if (conditionValue.length) {
                            var left = $.fxbConditions.helpers.toNumber(conditionValue);
                            if (typeof left === "number") {
                                var right = $.fxbConditions.helpers.toNumber(fieldValue);
                                return typeof right !== "number" || left !== right;
                            }
                        }

                        return true;
                    },

                    "is greater than": function(conditionValue, fieldValue) {
                        conditionValue = $.fxbConditions.helpers.normalize(conditionValue);
                        fieldValue = $.fxbConditions.helpers.normalize(fieldValue);

                        if (conditionValue.length) {
                            var left = $.fxbConditions.helpers.toNumber(conditionValue);
                            if (typeof left === "number") {
                                var right = $.fxbConditions.helpers.toNumber(fieldValue);
                                return typeof right === "number" && right > left;
                            }
                        }

                        return fieldValue > conditionValue;
                    },

                    "is greater than or equal to": function(conditionValue, fieldValue) {
                        conditionValue = $.fxbConditions.helpers.normalize(conditionValue);
                        fieldValue = $.fxbConditions.helpers.normalize(fieldValue);

                        if (fieldValue === conditionValue) {
                            return true;
                        }

                        if (conditionValue.length) {
                            var left = $.fxbConditions.helpers.toNumber(conditionValue);
                            if (typeof left === "number") {
                                var right = $.fxbConditions.helpers.toNumber(fieldValue);
                                return typeof right === "number" && right >= left;
                            }
                        }

                        return fieldValue >= conditionValue;
                    },

                    "is less than": function(conditionValue, fieldValue) {
                        conditionValue = $.fxbConditions.helpers.normalize(conditionValue);
                        fieldValue = $.fxbConditions.helpers.normalize(fieldValue);

                        if (conditionValue.length) {
                            var left = $.fxbConditions.helpers.toNumber(conditionValue);
                            if (typeof left === "number") {
                                var right = $.fxbConditions.helpers.toNumber(fieldValue);
                                return typeof right === "number" && right < left;
                            }
                        }

                        return fieldValue < conditionValue;
                    },

                    "is less than or equal to": function(conditionValue, fieldValue) {
                        conditionValue = $.fxbConditions.helpers.normalize(conditionValue);
                        fieldValue = $.fxbConditions.helpers.normalize(fieldValue);

                        if (fieldValue === conditionValue) {
                            return true;
                        }

                        if (conditionValue.length) {
                            var left = $.fxbConditions.helpers.toNumber(conditionValue);
                            if (typeof left === "number") {
                                var right = $.fxbConditions.helpers.toNumber(fieldValue);
                                return typeof right === "number" && right <= left;
                            }
                        }

                        return fieldValue <= conditionValue;
                    },

                    addOperator: function(operatorName, operatorFn) {
                        if (operatorName && operatorName.length) {
                            this[operatorName.toLowerCase()] = operatorFn;
                        }
                    },

                    getOperator: function(operatorName) {
                        return operatorName && operatorName.length ? this[operatorName.toLowerCase()] : null;
                    }
                },

                prototype: {
                    initConditions: function(options) {
                        this.options = $.extend(true, this.options || {}, options);

                        if (!this.options.fieldConditions) {
                            return;
                        }

                        var sourceFields = [];
                        this.options.fieldConditions.forEach(function(fieldCondition) {
                            if (!fieldCondition || !fieldCondition.conditions) {
                                return;
                            }

                            fieldCondition.conditions.forEach(function(condition) {
                                if (condition.fieldId && sourceFields.indexOf(condition.fieldId) === -1) {
                                    sourceFields.push(condition.fieldId);
                                    var $source = this.$el.find("[data-sc-field-key=\"" + condition.fieldId + "\"]")
                                        .filter(function() {
                                            return $.fxbConditions.helpers.endsWith(this.name, "value");
                                        });
                                    if ($source.length) {
                                        $source.on("change", this.applyConditions.bind(this));
                                    }
                                }
                            }.bind(this));
                        }.bind(this));

                        this.applyConditions();
                        this.loaded = true;
                    },

                    applyConditions: function() {
                        if (!this.options.fieldConditions) {
                            return;
                        }

                        this.executedActions = [];
                        this.fieldActions = {};

                        this.options.fieldConditions.forEach(function(fieldCondition) {
                            if (fieldCondition && fieldCondition.actions && fieldCondition.actions.length) {
                                var conditionsResult = this.evaluateConditions(fieldCondition);
                                fieldCondition.actions.forEach(function(action) {
                                    this.gatherFieldActions(action, conditionsResult);
                                }.bind(this));
                            }
                        }.bind(this));

                        for (var fieldId in this.fieldActions) {
                            if (!this.fieldActions.hasOwnProperty(fieldId)) continue;
                            for (var actionType in this.fieldActions[fieldId]) {
                                if (!this.fieldActions[fieldId].hasOwnProperty(actionType)) continue;
                                var action = this.fieldActions[fieldId][actionType].action;
                                var conditionsResult = this.fieldActions[fieldId][actionType].conditionsResult;
                                this.executeAction(action, conditionsResult);
                            }
                        }
                    },

                    setRequired: function($targets) {
                        $targets.each(function(idx, target) {
                            var $target = $(target);
                            if ($target.is("input:not([type='submit']), select, textarea")) {
                                var name = target.name;
                                if (!$.fxbConditions.helpers.endsWith(name, "value") && !$.fxbConditions.helpers.endsWith(name, "Files") )
                                    return;

                                name = name.slice(0, -(name.length - name.lastIndexOf(".") - 1)) + "Required";
                                var $requiredEl = this.$el.find("[name=\"" + name + "\"][data-sc-conditions-required]"),
                                    isNotAccessible = $target.is(":hidden") ||
                                        $target.css("visibility") === "hidden" ||
                                        target.disabled;

                                if (!$requiredEl.length) {
                                    if (isNotAccessible) {
                                        var $currentEl = this.$el.find("[name=\"" + target.name + "\"]");
                                        $('<input>').attr({
                                            type: 'hidden',
                                            name: name,
                                            value: false,
                                            "data-sc-conditions-required": ""
                                        }).insertAfter($currentEl.last());
                                    }

                                    return;
                                }

                                $requiredEl.val(false);
                                $requiredEl.prop("disabled", !isNotAccessible);
                            } else {
                                this.setRequired($target.find("input:not([type='submit']), select, textarea"));
                            }
                        }.bind(this));
                    },

                    executeAction: function(action, conditionsResult) {
                        if (action && action.fieldId && action.actionType) {
                            var $target = this.$el.find("[data-sc-field-key=\"" + action.fieldId + "\"]");
                            if ($target.length) {
                                var actionFn = $.fxbConditions.actions.getAction(action.actionType, conditionsResult);
                                if (actionFn && typeof actionFn === "function") {
                                    actionFn.call(this, $target, action, conditionsResult);
                                    var executedAction = $.extend(true,
                                        action,
                                        {
                                            conditionsResult: conditionsResult
                                        });
                                    this.executedActions.push(executedAction);
                                }
                            }
                        }
                    },

                    evaluateConditions: function(fieldCondition) {
                        if (!fieldCondition || !fieldCondition.conditions) return true;

                        var matchType = (fieldCondition.matchType || "").toLowerCase();
                        switch (matchType) {
                        case "all":
                            return fieldCondition.conditions.every(this.isConditionSatisfied.bind(this));
                        case "any":
                        default:
                            return fieldCondition.conditions.some(this.isConditionSatisfied.bind(this));
                        }
                    },

                    gatherFieldActions: function(action, conditionsResult) {
                        if (action && action.fieldId && action.actionType) {
                            if (typeof this.fieldActions[action.fieldId] === "undefined") {
                                this.fieldActions[action.fieldId] = {};
                            }

                            if (typeof this.fieldActions[action.fieldId][action.actionType] === "undefined") {
                                this.fieldActions[action.fieldId][action.actionType] = {
                                    action: action,
                                    conditionsResult: conditionsResult
                                };
                            }
                            // if a true conditionsResult finally appears for this particular fieldId and actionType, set it to true.
                            // from now on, it can never be set back to false again.
                            // (existing is deleted first to ensure this latest action appears at the bottom of the queue)
                            else if (!this.fieldActions[action.fieldId][action.actionType].conditionsResult && conditionsResult) {
                                delete this.fieldActions[action.fieldId][action.actionType];
                                this.fieldActions[action.fieldId][action.actionType] = {
                                    action: action,
                                    conditionsResult: true
                                };
                            }
                        }
                    },

                    getValueList: function(fieldId) {
                        var $fieldEl = this.$el.find("[data-sc-field-key=\"" + fieldId + "\"]").filter(function() {
                            return $.fxbConditions.helpers.endsWith(this.name, "value");
                        });

                        var $listElements = $fieldEl.filter(function(idx, element) {
                            return element.type === "checkbox" || element.type === "radio";
                        });

                        if (!$listElements.length && $fieldEl.prop("multiple")) {
                            $listElements = $fieldEl.find("option");
                        }

                        var value;
                        if ($listElements.length) {
                            if ($listElements.length > 1) {
                                value = $listElements.filter(":checked").map(function() {
                                    return $(this).val();
                                }).get();
                                if (!value.length) {
                                    value.push("");
                                }
                            } else {
                                value = [$listElements[0].checked ? "true" : "false"];
                            }
                        } else {
                            value = [$fieldEl.val()];
                        }

                        return value;
                    },

                    isConditionSatisfied: function(condition) {
                        if (condition && condition.operator) {
                            var operatorFn = $.fxbConditions.operators.getOperator(condition.operator);
                            if (operatorFn && typeof operatorFn === "function") {

                                var valueList = this.getValueList(condition.fieldId);
                                var result = condition.operator === "is not equal to"
                                    ? valueList.every(operatorFn.bind(this, condition.value))
                                    : valueList.some(operatorFn.bind(this, condition.value));
                                return result;
                            };
                        }

                        return false;
                    }
                }
            });

    $.fn.init_fxbConditions = function(options) {
        return this.each(function() {
            var conditions = $.data(this, "fxbForms.conditions");
            if (conditions) {
                conditions.initConditions(options);
            } else {
                conditions = new $.fxbConditions(this, options);
                $.data(this, "fxbForms.conditions", conditions);
                conditions.initConditions();
            }
        });
    };

    $.fn.init_formConditions = function() {
        var input = this.find('input[data-sc-fxb-condition]');
        if (input) {
            var conditions = JSON.parse(input.attr('value'));
            if (conditions) {
                if (typeof this.init_fxbConditions === 'function') {
                    this.init_fxbConditions(conditions);
                }
            }
        }
    };

    var forms = $("form[data-sc-fxb]");
    if (forms.length) {
        forms.each(function () {
            var formEl = $(this);
            formEl.init_formConditions();
        }).parent().on("submit", "form[data-sc-fxb]", function () {
            var $submitBtns = $(this).find("input[type='submit'], button[type='submit']");
            if ($submitBtns.length) {
                $('html, body').animate({
                    scrollTop: $(this).offset().top
                }, 500);
                $submitBtns.on("click", function () {
                    return false;
                });
            }
        });
    }
});