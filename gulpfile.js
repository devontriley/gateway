const { src, dest, watch, series, parallel } = require( 'gulp' )
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify')
const rename = require('gulp-rename')
const browsersync = require("browser-sync").create();

// BrowserSync
function browserSync(done) {
    browsersync.init({
        proxy: 'vinfen-gateway-multisite.local',
        open: false,
        notify: false,
        ghostMode: false,
        ui: {
            port: 8001
        }
    });
    done();
}

// BrowserSync Reload
function browserSyncReload(done) {
    browsersync.reload();
    done();
}

function js() {
    return src([
        '**/*.js',
        '!**/*.min.js',
        '!gulpfile.js',
        '!node_modules/**'
    ])
        .pipe(uglify())
        .pipe(rename({ extname: '.min.js' }))
        .pipe(dest('.'))
        .pipe(browsersync.stream());
}

function mainSCSS() {
    return src([
        './scss/style.scss'
    ])
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('.'))
        .pipe(browsersync.stream());
}

function layoutSCSS() {
    return src([
        './layouts/**/*.scss'
    ])
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('layouts'))
        .pipe(browsersync.stream());
}

function watchFiles () {
    watch( [ './layouts/**/*.scss' ], series( layoutSCSS, browserSyncReload ) )
    watch( [ './scss/**/*.scss' ], series(mainSCSS, browserSyncReload) )
    watch( [ '**/*.js', '!**/*.min.js', '!gulpfile.js', '!mode_modules/**' ], series( js, browserSyncReload ) )
}
exports.build = parallel( layoutSCSS, mainSCSS, js )
exports.default = parallel( browserSync, watchFiles )