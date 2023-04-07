const { src, dest, watch, series, parallel } = require( 'gulp' )
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify')
const browsersync = require("browser-sync").create();

// BrowserSync
function browserSync(done) {
    browsersync.init({
        proxy: 'gateway-arts.vinfen-gateway-multisite.local',
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

function mainSCSS() {
    return src([
        './scss/style.scss'
    ])
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('.'))
        .pipe(browsersync.stream());
}

function watchFiles () {
    watch( [ './scss/**/*.scss' ], series(mainSCSS, browserSyncReload) )
}
exports.build = parallel( mainSCSS )
exports.default = parallel( browserSync, watchFiles )