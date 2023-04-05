const { src, dest, watch, series, parallel } = require( 'gulp' )
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify')

function mainSCSS() {
    return src([
        './scss/style.scss'
    ])
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('.'))
}

exports.build = parallel( mainSCSS )
exports.default = () => {
    watch( [ './scss/*.scss' ], mainSCSS )
}