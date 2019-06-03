const $           = require('gulp-load-plugins')(),
      browserSync = require('browser-sync').create(),
      del         = require('del'),
      gulp        = require('gulp')

function data() {
  return gulp.src('source/data/**/*')
    .pipe(gulp.dest('./assets/data'))
}

function files() {
  return gulp.src('source/files/**/*')
    .pipe(gulp.dest('./assets/files'))
}

function fonts() {
  return gulp.src('source/fonts/**/*')
    .pipe(gulp.dest('./assets/fonts'))
}

function images() {
  return gulp.src('source/images/**/*')
    .pipe($.imagemin([
      $.imagemin.gifsicle({interlaced: true}),
      $.imagemin.jpegtran({progressive: true}),
      $.imagemin.optipng({optimizationLevel: 5})
    ]))
    .pipe(gulp.dest('./assets/images'))
}

function movies() {
  return gulp.src('source/movies/**/*')
    .pipe(gulp.dest('./assets/movies'))
}

function php() {
	return gulp.src('source/*.php')
		.pipe(gulp.dest('./'))
}

function css() {
  return gulp.src('source/stylesheets/**/*.scss')
		.pipe($.sourcemaps.init({ loadMaps: true }))
		.pipe($.sass().on('error', $.sass.logError))
		.pipe($.autoprefixer({browsers: ['last 2 versions']}))
		.pipe($.cssnano())
		.pipe($.sourcemaps.write('../maps'))
		.pipe(gulp.dest('./stylesheets'))
		.pipe(browserSync.stream())
}

function Vendors() {
  return gulp.src([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/jquery-smooth-scroll/src/jquery.smooth-scroll.js',
    'node_modules/popper.js/dist/umd/popper.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js'
  ])
    .pipe($.sourcemaps.init({ loadMaps: true }))
    .pipe($.concat('vendors.js'))
    .pipe($.uglify())
    .pipe($.sourcemaps.write('../maps'))
    .pipe(gulp.dest('./scripts'))
}

function js() {
  return gulp.src('source/scripts/main.js')
		.pipe($.sourcemaps.init({ loadMaps: true }))
		.pipe($.concat('main.js'))
		.pipe($.jshint())
		.pipe($.jshint.reporter('default'))
		.pipe($.babel())
		.pipe($.uglify())
		.pipe($.sourcemaps.write('../maps'))
		.pipe(gulp.dest('./scripts'))
}

function clean(done) {
	del('*.php')
  del('*.css')
  del('stylesheets')
  del('scripts')
  del('maps')
  del('assets/files')
  del('assets/fonts')
	done()
}

function watch_files() {
	gulp.watch('source/data/**/*', data)
	gulp.watch('source/images/**/*', files)
	gulp.watch('source/fonts/**/*', fonts)
	gulp.watch('source/images/**/*', images)
	gulp.watch('source/movies/**/*', movies)

	gulp.watch('source/*.php', php).on('change', browserSync.reload)
	gulp.watch('source/stylesheets/**/*.scss', css)
	gulp.watch('source/scripts/**/*.js', js).on('change', browserSync.reload)

	browserSync.init({
		proxy: 'http://pereirinhafc.local',
		tunnel: 'pereirinhafc'
		// port: '80',
		// open: 'external',
		// host: 'pereirinha.localtunnel.me',
	});
}

function build(done) {
	data()
	files()
	fonts()
	movies()
	php()
	css()
  js()
  Vendors()
	done()
}

function imageclean(done) {
  del('assets/images')
  done()
}

function imagemin(done) {
  images()
  done()
}

exports.clean      = clean
exports.build      = build
exports.watch      = watch_files
exports.default    = gulp.series(clean, build, watch_files)
exports.imagemin   = imagemin
exports.imageclean = imageclean