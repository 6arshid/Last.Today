function drawer_toConsumableArray(arr) { return drawer_arrayWithoutHoles(arr) || drawer_iterableToArray(arr) || drawer_unsupportedIterableToArray(arr) || drawer_nonIterableSpread(); }

function drawer_nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function drawer_unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return drawer_arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return drawer_arrayLikeToArray(o, minLen); }

function drawer_iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function drawer_arrayWithoutHoles(arr) { if (Array.isArray(arr)) return drawer_arrayLikeToArray(arr); }

function drawer_arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function drawer_ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function drawer_objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? drawer_ownKeys(Object(source), !0).forEach(function (key) { drawer_defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : drawer_ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

function drawer_defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function drawer_classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function drawer_defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function drawer_createClass(Constructor, protoProps, staticProps) { if (protoProps) drawer_defineProperties(Constructor.prototype, protoProps); if (staticProps) drawer_defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var drawer_Default = {
    placement: 'left',
    bodyScrolling: false,
    backdrop: true,
    edge: false,
    edgeOffset: 'bottom-[60px]',
    backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-30',
    onShow: function onShow() {},
    onHide: function onHide() {},
    onToggle: function onToggle() {}
};

var Drawer = /*#__PURE__*/function () {
    function Drawer() {
        var targetEl = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
        var options = arguments.length > 1 ? arguments[1] : undefined;

        drawer_classCallCheck(this, Drawer);

        this._targetEl = targetEl;
        this._options = drawer_objectSpread(drawer_objectSpread({}, drawer_Default), options);
        this._visible = false;

        this._init();
    }

    drawer_createClass(Drawer, [{
        key: "_init",
        value: function _init() {
            var _this = this;

            // set initial accessibility attributes
            if (this._targetEl) {
                this._targetEl.setAttribute('aria-hidden', 'true');

                this._targetEl.classList.add('transition-transform');
            } // set base placement classes


            this._getPlacementClasses(this._options.placement).base.map(function (c) {
                _this._targetEl.classList.add(c);
            }); // hide by default


            this.hide();
        }
    }, {
        key: "isVisible",
        value: function isVisible() {
            return this._visible;
        }
    }, {
        key: "hide",
        value: function hide() {
            var _this2 = this;

            // based on the edge option show placement classes
            if (this._options.edge) {
                this._getPlacementClasses(this._options.placement + '-edge').active.map(function (c) {
                    _this2._targetEl.classList.remove(c);
                });

                this._getPlacementClasses(this._options.placement + '-edge').inactive.map(function (c) {
                    _this2._targetEl.classList.add(c);
                });
            } else {
                this._getPlacementClasses(this._options.placement).active.map(function (c) {
                    _this2._targetEl.classList.remove(c);
                });

                this._getPlacementClasses(this._options.placement).inactive.map(function (c) {
                    _this2._targetEl.classList.add(c);
                });
            } // set accessibility attributes


            this._targetEl.setAttribute('aria-hidden', 'true');

            this._targetEl.removeAttribute('aria-modal');

            this._targetEl.removeAttribute('role'); // enable body scroll


            if (!this._options.bodyScrolling) {
                document.body.classList.remove('overflow-hidden');
            } // destroy backdrop


            if (this._options.backdrop) {
                this._destroyBackdropEl();
            }

            this._visible = false; // callback function

            this._options.onHide(this);
        }
    }, {
        key: "show",
        value: function show() {
            var _this3 = this;

            if (this._options.edge) {
                this._getPlacementClasses(this._options.placement + '-edge').active.map(function (c) {
                    _this3._targetEl.classList.add(c);
                });

                this._getPlacementClasses(this._options.placement + '-edge').inactive.map(function (c) {
                    _this3._targetEl.classList.remove(c);
                });
            } else {
                this._getPlacementClasses(this._options.placement).active.map(function (c) {
                    _this3._targetEl.classList.add(c);
                });

                this._getPlacementClasses(this._options.placement).inactive.map(function (c) {
                    _this3._targetEl.classList.remove(c);
                });
            } // set accessibility attributes


            this._targetEl.setAttribute('aria-modal', 'true');

            this._targetEl.setAttribute('role', 'dialog');

            this._targetEl.removeAttribute('aria-hidden'); // disable body scroll


            if (!this._options.bodyScrolling) {
                document.body.classList.add('overflow-hidden');
            } // show backdrop


            if (this._options.backdrop) {
                this._createBackdrop();
            }

            this._visible = true; // callback function

            this._options.onShow(this);
        }
    }, {
        key: "toggle",
        value: function toggle() {
            if (this.isVisible()) {
                this.hide();
            } else {
                this.show();
            }
        }
    }, {
        key: "_createBackdrop",
        value: function _createBackdrop() {
            var _this4 = this;

            if (!this._visible) {
                var _backdropEl$classList;

                var backdropEl = document.createElement('div');
                backdropEl.setAttribute('drawer-backdrop', '');

                (_backdropEl$classList = backdropEl.classList).add.apply(_backdropEl$classList, drawer_toConsumableArray(this._options.backdropClasses.split(" ")));

                document.querySelector('body').append(backdropEl);
                backdropEl.addEventListener('click', function () {
                    _this4.hide();
                });
            }
        }
    }, {
        key: "_destroyBackdropEl",
        value: function _destroyBackdropEl() {
            if (this._visible) {
                document.querySelector('[drawer-backdrop]').remove();
            }
        }
    }, {
        key: "_getPlacementClasses",
        value: function _getPlacementClasses(placement) {
            switch (placement) {
                case 'top':
                    return {
                        base: ['top-0', 'left-0', 'right-0'],
                        active: ['transform-none'],
                        inactive: ['-translate-y-full']
                    };

                case 'right':
                    return {
                        base: ['right-0', 'top-0'],
                        active: ['transform-none'],
                        inactive: ['translate-x-full']
                    };

                case 'bottom':
                    return {
                        base: ['bottom-0', 'left-0', 'right-0'],
                        active: ['transform-none'],
                        inactive: ['translate-y-full']
                    };

                case 'left':
                    return {
                        base: ['left-0', 'top-0'],
                        active: ['transform-none'],
                        inactive: ['-translate-x-full']
                    };

                case 'bottom-edge':
                    return {
                        base: ['left-0', 'top-0'],
                        active: ['transform-none'],
                        inactive: ['translate-y-full', this._options.edgeOffset]
                    };

                default:
                    return {
                        base: ['left-0', 'top-0'],
                        active: ['transform-none'],
                        inactive: ['-translate-x-full']
                    };
            }
        }
    }]);

    return Drawer;
}();

window.Drawer = Drawer;

var getDrawerInstance = function getDrawerInstance(id, instances) {
    if (instances.some(function (drawerInstance) {
        return drawerInstance.id === id;
    })) {
        return instances.find(function (drawerInstance) {
            return drawerInstance.id === id;
        });
    }

    return false;
};

function initDrawer() {
    var drawerInstances = [];
    document.querySelectorAll('[data-drawer-target]').forEach(function (triggerEl) {
        // mandatory
        var targetEl = document.getElementById(triggerEl.getAttribute('data-drawer-target'));
        var drawerId = targetEl.id; // optional

        var placement = triggerEl.getAttribute('data-drawer-placement');
        var bodyScrolling = triggerEl.getAttribute('data-drawer-body-scrolling');
        var backdrop = triggerEl.getAttribute('data-drawer-backdrop');
        var edge = triggerEl.getAttribute('data-drawer-edge');
        var edgeOffset = triggerEl.getAttribute('data-drawer-edge-offset');
        var drawer = null;

        if (getDrawerInstance(drawerId, drawerInstances)) {
            drawer = getDrawerInstance(drawerId, drawerInstances);
            drawer = drawer.object;
        } else {
            drawer = new Drawer(targetEl, {
                placement: placement ? placement : drawer_Default.placement,
                bodyScrolling: bodyScrolling ? bodyScrolling === 'true' ? true : false : drawer_Default.bodyScrolling,
                backdrop: backdrop ? backdrop === 'true' ? true : false : drawer_Default.backdrop,
                edge: edge ? edge === 'true' ? true : false : drawer_Default.edge,
                edgeOffset: edgeOffset ? edgeOffset : drawer_Default.edgeOffset
            });
            drawerInstances.push({
                id: drawerId,
                object: drawer
            });
        }
    });
    document.querySelectorAll('[data-drawer-toggle]').forEach(function (triggerEl) {
        var targetEl = document.getElementById(triggerEl.getAttribute('data-drawer-toggle'));
        var drawerId = targetEl.id;
        var drawer = getDrawerInstance(drawerId, drawerInstances);
        triggerEl.addEventListener('click', function () {
            if (drawer.object.isVisible()) {
                drawer.object.hide();
            } else {
                drawer.object.show();
            }
        });
    });
    document.querySelectorAll('[data-drawer-dismiss]').forEach(function (triggerEl) {
        var targetEl = document.getElementById(triggerEl.getAttribute('data-drawer-dismiss'));
        var drawerId = targetEl.id;
        var drawer = getDrawerInstance(drawerId, drawerInstances);
        triggerEl.addEventListener('click', function () {
            drawer.object.hide();
        });
    });
    document.querySelectorAll('[data-drawer-show]').forEach(function (triggerEl) {
        var targetEl = document.getElementById(triggerEl.getAttribute('data-drawer-show'));
        var drawerId = targetEl.id;
        var drawer = getDrawerInstance(drawerId, drawerInstances);
        triggerEl.addEventListener('click', function () {
            drawer.object.show();
        });
    });
}

if (document.readyState !== 'loading') {
    // DOMContentLoaded event were already fired. Perform explicit initialization now
    initDrawer();
} else {
    // DOMContentLoaded event not yet fired, attach initialization process to it
    document.addEventListener('DOMContentLoaded', initDrawer);
}

/* harmony default export */ const drawer = (Drawer);