/**
 * Just a little testing script
 */
import $ from 'jquery';

const Foo = (($) => {
  // jQuery's on document ready...
  $(() => {
    console.log('Foo Bar Baz!')

    console.log( $('.header.wrap') )
  })
  return Foo;
})($);
export default Foo;
