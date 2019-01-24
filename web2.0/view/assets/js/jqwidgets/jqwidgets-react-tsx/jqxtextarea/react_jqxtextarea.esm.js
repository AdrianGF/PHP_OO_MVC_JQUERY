import * as jqxcore from '../../jqwidgets/jqxcore';
import * as jqxdata from '../../jqwidgets/jqxdata';
import * as jqxbuttons from '../../jqwidgets/jqxbuttons';
import * as jqxscrollbar from '../../jqwidgets/jqxscrollbar';
import * as jqxtextarea from '../../jqwidgets/jqxtextarea';
import { createElement, PureComponent } from 'react';

/*! *****************************************************************************
Copyright (c) Microsoft Corporation. All rights reserved.
Licensed under the Apache License, Version 2.0 (the "License"); you may not use
this file except in compliance with the License. You may obtain a copy of the
License at http://www.apache.org/licenses/LICENSE-2.0

THIS CODE IS PROVIDED ON AN *AS IS* BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED
WARRANTIES OR CONDITIONS OF TITLE, FITNESS FOR A PARTICULAR PURPOSE,
MERCHANTABLITY OR NON-INFRINGEMENT.

See the Apache Version 2.0 License for specific language governing permissions
and limitations under the License.
***************************************************************************** */
/* global Reflect, Promise */

var extendStatics = function(d, b) {
    extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return extendStatics(d, b);
};

function __extends(d, b) {
    extendStatics(d, b);
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
}

var JqxTextArea = /** @class */ (function (_super) {
    __extends(JqxTextArea, _super);
    function JqxTextArea(props) {
        var _this = _super.call(this, props) || this;
        /* tslint:disable:variable-name */
        _this._jqx = JQXLite;
        _this._id = 'JqxTextArea' + _this._jqx.generateID();
        _this._componentSelector = '#' + _this._id;
        _this.state = { lastProps: props };
        return _this;
    }
    JqxTextArea.getDerivedStateFromProps = function (props, state) {
        var areEqual = Object.is(props, state.lastProps);
        if (!areEqual) {
            var newState = { lastProps: props };
            return newState;
        }
        return null;
    };
    JqxTextArea.prototype.componentDidUpdate = function () {
        var widgetOptions = this._manageProps();
        this.setOptions(widgetOptions);
    };
    JqxTextArea.prototype.componentDidMount = function () {
        if (this.props.autoCreate) {
            this._createComponent();
        }
    };
    JqxTextArea.prototype.render = function () {
        return (createElement("textarea", { id: this._id }, this.props.children));
    };
    JqxTextArea.prototype.createComponent = function (options) {
        if (!this.props.autoCreate) {
            this._createComponent(options);
        }
        else {
            /* tslint:disable:no-console */
            console.warn('Component is already created! If you want to use createComponent, please set "autoCreate" prop to "false".');
        }
    };
    JqxTextArea.prototype.setOptions = function (options) {
        this._jqx(this._componentSelector).jqxTextArea(options);
    };
    JqxTextArea.prototype.getOptions = function (option) {
        return this._jqx(this._componentSelector).jqxTextArea(option);
    };
    JqxTextArea.prototype.addEventListener = function (name, callbackFn) {
        this._jqx(this._componentSelector).on(name, callbackFn);
    };
    JqxTextArea.prototype.removeEventListener = function (name) {
        this._jqx(this._componentSelector).off(name);
    };
    JqxTextArea.prototype.destroy = function () {
        this._jqx(this._componentSelector).jqxTextArea('destroy');
    };
    JqxTextArea.prototype.focus = function () {
        this._jqx(this._componentSelector).jqxTextArea('focus');
    };
    JqxTextArea.prototype.refresh = function () {
        this._jqx(this._componentSelector).jqxTextArea('refresh');
    };
    JqxTextArea.prototype.renderWidget = function () {
        this._jqx(this._componentSelector).jqxTextArea('render');
    };
    JqxTextArea.prototype.selectAll = function () {
        this._jqx(this._componentSelector).jqxTextArea('selectAll');
    };
    JqxTextArea.prototype.val = function (value) {
        return this._jqx(this._componentSelector).jqxTextArea('val', value);
    };
    JqxTextArea.prototype._createComponent = function (options) {
        var widgetOptions = options ? options : this._manageProps();
        this._jqx(this._componentSelector).jqxTextArea(widgetOptions);
        this._wireEvents();
    };
    JqxTextArea.prototype._manageProps = function () {
        var widgetProps = ['disabled', 'displayMember', 'dropDownWidth', 'height', 'items', 'maxLength', 'minLength', 'opened', 'placeHolder', 'popupZIndex', 'query', 'renderer', 'roundedCorners', 'rtl', 'scrollBarSize', 'searchMode', 'source', 'theme', 'valueMember', 'width'];
        var options = {};
        for (var prop in this.props) {
            if (widgetProps.indexOf(prop) !== -1) {
                options[prop] = this.props[prop];
            }
        }
        return options;
    };
    JqxTextArea.prototype._wireEvents = function () {
        for (var prop in this.props) {
            if (prop.indexOf('on') === 0) {
                var originalEventName = prop.slice(2);
                originalEventName = originalEventName.charAt(0).toLowerCase() + originalEventName.slice(1);
                this._jqx(this._componentSelector).on(originalEventName, this.props[prop]);
            }
        }
    };
    JqxTextArea.defaultProps = {
        autoCreate: true
    };
    return JqxTextArea;
}(PureComponent));
var jqx = window.jqx;
var JQXLite = window.JQXLite;
var jqwidgets = window.jqwidgets;

export default JqxTextArea;
export { jqx, JQXLite, jqwidgets };
