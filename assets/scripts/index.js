import $ from 'jquery';
import Foo from './foo';

(($) => {
  if (typeof $ === 'undefined') {
    throw new TypeError('jQuery not found! Make sure its available in the DOM before index.js')
  }
})($);


export {
  Foo
}
