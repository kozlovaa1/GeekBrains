'use strict';

const gulp = tars.packages.gulp;
const runSequence = tars.packages.runSequence.use(gulp);
const isBackendDevMode = tars.flags.backend;

/**
 * Build dev-version (without watchers)
 */
module.exports = () => {
    return gulp.task('main:build-dev', function (cb) {
        tars.options.notify = false;
        tars.options.watch.isActive = this.seq.slice(-1)[0] === 'dev' ? true : false; // eslint-disable-line no-invalid-this
        const finalTasks = ['js:processing'];

        if (!isBackendDevMode) {
            finalTasks.push('html:compile-templates');
        }

        runSequence(
            'service:clean',
            ['images:minify-svg', 'images:raster-svg'],
            [
                'css:make-sprite-for-svg', 'css:make-fallback-for-svg', 'css:make-sprite',
                'images:make-symbols-sprite'
            ],
            'css:post-scss',
            [
                'css:compile-css', 'css:compile-css-for-ie8', 'css:compile-css-for-ie9', 'css:move-separate',
                'html:concat-mocks-data',
                'other:move-misc-files', 'other:move-fonts', 'other:move-assets',
                'images:move-content-img', 'images:move-plugins-img', 'images:move-general-img',
                'js:move-separate'
            ],
            finalTasks,
            cb
        );
    });
};
