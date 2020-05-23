class Validator {
    constructor() {
        window.app = {};

        window.app.validator = {
            validateMessage: '',
            config: {
                selectorFieldItem: '.form-block, .form-item, .form-item-big',
                classInvalid: 'invalid',
                classValid: 'valid',
            },
            validArray: {},
            /**
             *
             * @param data
             * @param config
             */
            validate: function (data, config) {
                var
                    result = true;

                app.validator.parseMessage();
                _.each(config, function (rules, name) {
                    var
                        validate;

                    if (data.hasOwnProperty(name)) {
                        validate = this.parseRules(rules);
                        if (!this.valid(validate, data[name])) {
                            result = false;
                        }
                    }
                }.bind(this));

                return result;
            },
            valid: function(rules, data) {
                var
                    result = true;

                app.validator.parseMessage();
                _.each(rules, function(rule) {
                    if (!rule(data)) {
                        result = false;
                    }
                });
                return result;
            },
            parseMessage: function() {
                if (!app.validator.validateMessage) {
                    app.validator.validateMessage = $('.validate-message').data();
                }
            },
            parseRules: function (rulesStr) {
                var
                    rules = rulesStr.trim().split(' '),
                    resultRulles = [];

                _.each(rules, function (rule) {
                    resultRulles.push(this.parseRule(rule));
                }.bind(this));
                return resultRulles;
            },
            parseRule: function(rule) {
                var
                    _rule,
                    _val;

                if (rule.indexOf('(') > -1) {
                    _rule = rule.substring(0, rule.indexOf('('));
                    _val = rule.substring(rule.indexOf('(') + 1, rule.indexOf(')') -1);
                    if(_.isFunction(this.validateFunction[_rule])){
                        return this.validateFunction[_rule].bind(this, _val);
                    } else {
                        console.warn('Функция валидации не найдена - ' + _rule);
                        return this.defaultFunction;
                    }
                } else {
                    if (_.isFunction(this.validateFunction[rule])) {
                        return this.validateFunction[rule];
                    } else {
                        console.warn('Функция валидации не найдена - ' + rule);
                        return this.defaultFunction;
                    }
                }
            },
            validateFunction: {
                date: function (val) {
                    return _.isDate(val);
                },
                float: function (val) {
                    return validator.isFloat(val);
                },
                int: function (val) {
                    return validator.isInt(val);
                },
                number: function (val) {
                    return validator.isNumeric(val);
                },
                string: function (val) {
                    return _.isString(val);
                },
                noEmpty: function (val) {
                    return !_.isEmpty(val);
                },
                boolean: function (val) {
                    return _.isBoolean(val);
                },
                required: function (val) {
                    if (_.isString(val)) {
                        val = val.trim();
                    }
                    return !!val;
                },
                email: function (val) {
                    var
                        pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

                    return pattern.test(val);
                },
                phone: function (val) {
                    var
                        checkedString = val.replace(/[- )(]/g,''),
                        regex = /^((\+7|7|8|)+([0-9]){10,12})$/; // {10,12} - допустимое количество цифр в номере
                    var
                        result;

                    result = regex.test(checkedString);
                    return result;
                },
                valid: function(val, dataVal){
                    return dataVal;
                },
                checked: function (val, dataVal, el) {
                    return $(el).prop('checked');
                },
                orRequired: function(val, dataVal, el){
                    var
                        result = app.validator.validateFunction.required(val, dataVal, el);
                    var
                        item;
                    if (!result) {
                        item = _.findWhere(app.validator.validArray, {name: dataVal});
                        if (item) {
                            result = app.validator.validateFunction.required(item.value);
                        }
                    }
                    return result;
                }
            },
            invalidTextFunction: {
                date: function (val) {
                    return app.validator.validateMessage.date;
                },
                float: function (val) {
                    return app.validator.validateMessage.float;
                },
                int: function (val) {
                    return app.validator.validateMessage.int;
                },
                number: function (val) {
                    return app.validator.validateMessage.number;
                },
                string: function (val) {
                    return app.validator.validateMessage.string;
                },
                noEmpty: function (val) {
                    return app.validator.validateMessage.notEmpty;
                },
                boolean: function (val) {
                    return app.validator.validateMessage.boolean;
                },
                required: function (val) {
                    return  app.validator.validateMessage.required;
                },
                checked: function (val) {
                    return app.validator.validateMessage.checked;
                },
                email: function (val) {
                    return app.validator.validateMessage.email;
                },
                phone: function (val){
                    return app.validator.validateMessage.phone;
                },
                orRequired: function(value, ruleVal, elem)  {
                    return $(elem).data('orRequiredMessage');
                }
            },
            defaultFunction: function() {
                return true;
            },
            formValidate: function(array, $form, silent) {
                var
                    that = this,
                    allValid = true;

                app.validator.parseMessage();
                that.validArray = [];
                $form.find('input, select, textarea').each(function() {
                    var
                        $elem = $(this);

                    that.validArray.push({
                        elem: $elem,
                        rules: $elem.data(),
                        value: $elem.val(),
                        name: $elem.attr('name')
                    });
                });
                _.each(that.validArray, function(el) {
                    var
                        _elemValid = true;

                    _.each(el.rules, function (ruleVal, ruleName) {
                        var
                            $parent = el.elem.parents(that.config.selectorFieldItem);
                        var
                            text;

                        if (_.isFunction(that.validateFunction[ruleName]) && _elemValid) {
                            _elemValid = that.validateFunction[ruleName](el.value, ruleVal, el.elem);

                            if (!_elemValid) {
                                allValid = false;
                                if (!silent) {
                                    text = that.invalidTextFunction[ruleName](el.value, ruleVal, el.elem);
                                    $parent.addClass(that.config.classInvalid).removeClass(that.config.classValid).attr('data-ivalid-message', text);
                                }
                            } else {
                                $parent.removeClass(that.config.classInvalid).addClass(that.config.classValid);
                            }
                        }
                    });
                    if (!_elemValid) {
                    }
                });
                return allValid;
            },
            inputValidate: function($input) {
                var
                    that = this,
                    valid = true;

                app.validator.parseMessage();
                this.validArray = [];

                this.validArray.push({
                    elem: $input,
                    rules: $input.data(),
                    value: $input.val(),
                    name: $input.attr('name')
                });

                _.each(that.validArray, function(el) {
                    var
                        _elemValid = true;

                    _.each(el.rules, function (ruleVal, ruleName) {
                        var
                            $parent = el.elem.parents(that.config.selectorFieldItem);
                        var
                            text;

                        if (_.isFunction(that.validateFunction[ruleName]) && _elemValid) {
                            _elemValid = that.validateFunction[ruleName](el.value, ruleVal, el.elem);

                            if (!_elemValid) {
                                valid = false;
                                text = that.invalidTextFunction[ruleName](el.value, ruleVal, el.elem);
                                $parent.addClass(that.config.classInvalid).removeClass(that.config.classValid).attr('data-ivalid-message', text);
                            } else {
                                $parent.removeClass(that.config.classInvalid).addClass(that.config.classValid);
                            }
                        }
                    });
                });
                return valid;
            }
        };
    }
}

export default Validator;
