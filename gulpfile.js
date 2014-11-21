var gulp = require('gulp'),
  // Load gulp plugins

  // System
  gutil     = require('gulp-util'),
  concat    = require('gulp-concat'),
  cache     = require('gulp-cache'),

  // Files
  myth      = require('gulp-myth'),
  minifyCSS = require('gulp-minify-css'),
  pixrem    = require('gulp-pixrem'),
  svgmin    = require('gulp-svgmin'),
  svg2png   = require('gulp-svg2png'),
  imagemin  = require('gulp-imagemin'),
  rename    = require('gulp-rename'),
  uglify    = require('gulp-uglify'),

  // Server
  tinyLr           = require('tiny-lr'),
  livereload       = require('gulp-livereload'),
  watch            = require('gulp-watch'),
  liveReloadServer = tinyLr(),

  // Define paths
  paths = {
    css: [
      'src/assets/css/alpha.css',
      'src/assets/css/variables.css',
      'src/bower_components/normalize/normalize.css',
      'src/assets/css/base.css',
      'src/bower_components/suit-utils-*/*.css',
      'src/patternlab/**/**/*.css',
      'src/patternlab/**/**/**/*.css',
      'src/assets/css/debug.css',
      'src/assets/css/shame.css'
    ],
    js: [
      'src/assets/js/*.js',
      'src/patternlab/**/**/*.js',
      'src/patternlab/**/**/**/*.js'
    ],
    bowerjs: [
      'src/bower_components/jquery/dist/assets/jquery.min.js',
      'src/bower_components/svgeezy/svgeezy.min.js.js'
    ],
    svg: [
      // Optimise favicon manually
      'src/patternlab/**/**/*.svg',
      'src/patternlab/**/**/**/*.svg',
      'src/assets/img/svg/*.svg'
    ],
    bitmap: [
      'src/assets/img/bitmap/24bit/*',
      'tmp/assets/img/trans/*'
    ]
  };

// Error function
function handleError(type, e) {
  gutil.log(gutil.colors.red('Error for task: "' + type));
  gutil.log(gutil.colors.red(e.message));
}

// CSS task
gulp.task('css', function() {
  var stream = gulp.src(paths.css)
    .pipe(concat("styles.css"))
    .on('error', function(e){ handleError('Concat CSS files',e);})
    .pipe(myth())
    .on('error', function(e){ handleError('Run Myth processing',e);})
    .pipe(pixrem())
    .on('error', function(e){ handleError('Pixel fallback for rems',e);})
    .pipe(minifyCSS())
    .on('error', function(e){ handleError('Minify CSS files',e);})
    .pipe(gulp.dest('dist/assets/css'))
    .on('error', function(e){ handleError('Save CSS file',e);});
});

// SVG optimisation task
gulp.task('svgo', function() {
  return gulp.src(paths.svg)
    .pipe(svgmin())
    .pipe(rename({dirname: ""}))
    .pipe(gulp.dest('dist/assets/img/'));
});

// SVG to PNG task
gulp.task('svg2png', function() {
  return gulp.src(paths.svg)
    .pipe(svg2png())
    .pipe(rename({dirname: ""}))
    .pipe(gulp.dest('tmp/assets/img/trans/'));
});

// Bitmap minimisation task
// PNGs get converted into 8bit with pngquant
// JPEGs get made progressive & compressed
gulp.task('minimage', function() {
  return gulp.src(paths.bitmap)
    .pipe(cache(imagemin({ pngquant: true, optimizationLevel: 3, progressive: true })))
    .pipe(rename({dirname: ""}))
    .pipe(gulp.dest('dist/assets/img/'));
});

// Copy Bower JS components to dist task
// Bespoke task
gulp.task('copy', function() {
  return gulp.src(paths.bowerjs)
  .pipe(gulp.dest('dist/assets/js/'));
})

// JS uglify
gulp.task('uglification', function() {
  return gulp.src(paths.js)
  .pipe(concat('main.js'))
  .pipe(uglify())
  .pipe(gulp.dest('dist/assets/js'));
});

// Server tasks
gulp.task('livereload', ['tiny-lr-server'], function() {
  gulp.src(['dist/assets/css/styles.css','dist/assets/img/*.svg'])
    .pipe(watch())
    .on('error', function(e){ handleError('Watch file for LiveReload refresh',e);})
    .pipe(livereload(liveReloadServer));
});

gulp.task('tiny-lr-server', function(next) {
  liveReloadServer.listen(35729, function(err) {
    if (err) return console.error(err);
    next();
  });
});

// Watch task
gulp.task('watch', function () {
  gulp.watch(paths.css, ['css'])
  gulp.watch(paths.svg, ['svgo', 'svg2png']);
  gulp.watch(paths.bitmap, ['minimage']);
  gulp.watch(paths.js, ['uglification']);
});

// Default task
// temp disable:  'minimage',
gulp.task('default', ['css', /* 'uglification', 'svgo', 'svg2png',*/ 'watch', 'livereload']);
