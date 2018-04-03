!(function(){
  const Component = window.Component;

  class Header extends Component {
    constructor({ el }) {
      super({el});
    }


    _onClick() {
       console.log('Hello Header');
    }
  }

  window.Header = Header;
})();