module.exports = {
  bundle: {
    vendor: {
      scripts: [
        'frontend/web/assets/jQuery/dist/jquery.slim.min.js',
        'frontend/web/assets/popper.js/dist/umd/popper.min.js',
        'frontend/web/assets/twbs/bootstrap/dist/js/bootstrap.min.js',
        'frontend/web/assets/moment/min/moment.min.js',
        'frontend/web/assets/underscore/underscore-min.js',
        'frontend/web/assets/clndr/clndr.min.js',
      ],
      options: {
        maps: false
      }
    }
  }
};