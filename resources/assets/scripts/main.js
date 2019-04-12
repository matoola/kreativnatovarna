// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

// FONT AWESOME: import then needed Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';
// import the Facebook and Twitter icons
import { faFacebook, faTwitter, faInstagram } from '@fortawesome/free-brands-svg-icons';
// import Pro Regular icons
import { faFilePdf, faFileWord, faFileExcel, faFile, faSearch, faPhone, faCameraRetro, faFileAlt, faEnvelope, faMapMarker, faAngleLeft, faAngleRight } from '@fortawesome/pro-light-svg-icons';
// add the imported icons to the library
library.add(faFacebook, faTwitter, faInstagram, faFilePdf, faFileWord, faFileExcel, faFile, faSearch, faPhone, faEnvelope, faCameraRetro, faFileAlt, faMapMarker, faAngleLeft, faAngleRight);
// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
