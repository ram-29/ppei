module.exports = {
  bundle: {
    vendor: {
			scripts: [
        'frontend/web/assets/google-scripts/loader.js',
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.js',
        'node_modules/moment/min/moment.min.js',
        'node_modules/moment-timezone/builds/moment-timezone-with-data-2012-2022.min.js',
        'node_modules/underscore/underscore-min.js',
        'node_modules/clndr/clndr.min.js',
        'node_modules/nanogallery2/dist/jquery.nanogallery2.min.js',
      ],
      options: {
        maps: false,
      },
    },
  },
};
