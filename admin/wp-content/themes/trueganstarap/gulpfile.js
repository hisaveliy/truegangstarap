'use strict';

// @todo add copyright changer

// Caminhos
const paths = require('./gulppaths.json');

// Módulos comuns
const gulp       = require('gulp');
const watch      = require('gulp-watch');
const buffer     = require('vinyl-buffer');
const sourcemaps = require('gulp-sourcemaps');
const gulpif     = require('gulp-if');
const replace    = require('replace-in-file');

// Versionamento de ficheiros (cache busting)
const rev    = require('gulp-rev');
const revDel = require('rev-del');
const del    = require('del');

// Estilos
const sass     = require('gulp-sass');
const bulksass = require('gulp-sass-bulk-import');
const cleancss = require('gulp-clean-css');

// Scripts
const babel    = require('gulp-babel');
const include  = require('gulp-include');
const uglify   = require('gulp-uglify-es').default;

// Imagens e sprites
const imagemin         = require('gulp-imagemin');
const imageminPngquant = require('imagemin-pngquant');
const imageminMozjpeg  = require('imagemin-mozjpeg');
const spritesmith      = require('gulp.spritesmith');

// Variáveis adicionais
let deploy = false;

/**
 * Get data from command line.
 * Allows you to get values from commands to your functions.
 */
const arg = (argList => {
  let arg = {}, a, opt, thisOpt, curOpt;
  for (a = 0; a < argList.length; a++) {
    thisOpt = argList[a].trim();
    opt = thisOpt.replace(/^\-+/, '');

    if (opt === thisOpt) {
      // argument value
      if (curOpt) arg[curOpt] = opt;
      curOpt = null;
    }
    else {
      // argument name
      curOpt = opt;
      arg[curOpt] = true;
    }
  }
  return arg;
})(process.argv);

/**
 * Tasks
 */

// Cleanup styles and scripts build folder
gulp.task('cleanup', function() {

	return del([
		paths.output.resources + '/scripts/**',
		paths.output.resources + '/styles/**'
	]);

});



// Styles
gulp.task('styles', function() {

	return gulp.src(paths.input.styles + '/[^_]*.scss')
		.pipe(bulksass())
		.pipe(gulpif(!deploy, sourcemaps.init()))
		.pipe(sass({
			includePaths: ['./styles']
		}).on('error', sass.logError))
		.pipe(gulpif(deploy, cleancss()))
		.pipe(rev())
		.pipe(gulpif(!deploy, sourcemaps.write('/sourcemaps')))
		.pipe(gulp.dest(paths.output.styles))
		.pipe(rev.manifest())
		.pipe(revDel({
			force: true,
			dest: paths.output.styles,
			deleteMapExtensions: true
		}))
		.pipe(gulp.dest(paths.output.styles));

});



// Scripts
gulp.task('scripts', function() {

	return gulp.src(paths.input.scripts + '/[^_]*.js')
		.pipe(gulpif(!deploy, sourcemaps.init()))
		.pipe(include())
  	.pipe(babel())
  	.pipe(uglify())
		.pipe(rev())
		.pipe(gulpif(!deploy, sourcemaps.write('/sourcemaps')))
		.pipe(gulp.dest(paths.output.scripts))
		.pipe(rev.manifest())
		.pipe(revDel({
			force: true,
			dest: paths.output.scripts,
			deleteMapExtensions: true
		}))
		.pipe(gulp.dest(paths.output.scripts));

});



// Images
gulp.task('images', function() {
	return gulp.src(paths.input.images + '/**')
		.pipe(imagemin([
			imageminPngquant(),
			imageminMozjpeg([{quality: 60}])
		]))
		.pipe(gulp.dest(paths.output.images));
});



// Fonts
gulp.task('fonts', function () {
	return gulp.src(paths.input.fonts + '/**')
	.pipe(gulp.dest(paths.output.fonts));
});



// Sprites
gulp.task('sprites', function(done) {


	// Gera o sprite
	var spriteData = gulp.src(paths.input.sprites + '/*.png')
		.pipe(spritesmith({
			imgName: 'sprite.png',
			cssName: '_sprite.scss',
			imgPath: paths.output.cssimages + '/sprite.png'
		}));

	// Optimiza imagem e guarda-a
	var imgStream = spriteData.img
		.pipe(buffer())
		.pipe(imagemin({
			progressive: true,
			optimizationLevel: 7,
			svgoPlugins: [{removeViewBox: false}],
			use: [imageminPngquant()]
		}))
		.pipe(gulp.dest(paths.output.sprites));

	// Guarda SCSS com sprites
	var cssStream = spriteData.css
		.pipe(gulp.dest(paths.input.styles));

	done();

});


/**
 * Default/Watch
 */

// Task default, inicia watchers
gulp.task('default', function() {

	// Watcher de styles
	gulp.watch(paths.input.styles + '/**', gulp.series('styles'));

	// Watcher de scripts
	gulp.watch(paths.input.scripts + '/**', gulp.series('scripts'));

	// Watcher de imagens
	gulp.watch(paths.input.images + '/**', gulp.series('images'));

	// Watcher de sprites
	gulp.watch(paths.input.sprites + '/**', gulp.series('sprites'));

	// Watcher de fontes
	gulp.watch(paths.input.fonts + '/**', gulp.series('fonts'));

});


// Deploy
gulp.task('build', gulp.series(function(done){
	deploy = true;
	done();
}, 'cleanup', 'styles', 'scripts'));