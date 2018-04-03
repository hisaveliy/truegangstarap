!(function(){
  class Component {
    constructor({ el }) {
      this.el = el;

      this.el && this._initEvents();
    }

    _initEvents() {
      this.el.addEventListener('click', this._onClick.bind(this));
    }

    _onClick() {}
  }

  window.Component = Component;
})();