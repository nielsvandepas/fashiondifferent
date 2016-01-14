var gulp = require( 'gulp' ),
	stylus = require( 'gulp-stylus' ),
	csso = require( 'gulp-csso' ),
	concat = require( 'gulp-concat' ),
	uglify = require( 'gulp-uglify' ),
	rename = require( 'gulp-rename' ),
	plumber = require( 'gulp-plumber' ),
	copy = require( 'gulp-copy2' ),
	zip = require( 'gulp-zip' ),
	del = require( 'del' ),
	rev = require( 'gulp-rev'),
	revdel = require( 'rev-del' );

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

gulp.task( 'styles', function() {
	// Load all Stylus source files
	gulp.src( 'resources/assets/stylus/style.styl' )

		// Provide some error-catching
		.pipe( plumber() )

		// Compile Stylus into CSS
		.pipe( stylus() )

		// Output the CSS to a file
		.pipe( gulp.dest( 'public/css/' ) )

		// Minify the CSS
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( csso( false ) )

		// Version cache busting
		// .pipe( rev() )

		// Output the minified CSS
		.pipe( gulp.dest( 'public/css/' ) );

		// Output version manifest
		/* .pipe( rev.manifest( 'rev-manifest.json', {
			base: 'public',
			merge: true
		} ) )
		.pipe( revdel( ) )
		.pipe( gulp.dest( 'public' ) ); */
} );

gulp.task( 'bower', function() {
	return gulp.src( [ 'resources/assets/bower/**/dist/*.js', '!resources/assets/bower/**/dist/*.min.js', '!resources/assets/bower/**/dist/*.common.js' ] )

		// Provide some error-catching
		.pipe( plumber() )

		// Concatenate all bower scripts into one file
		.pipe( concat( '1-bower.js') )

		// Output the script to our Javascript-assets folder
		.pipe( gulp.dest( 'resources/assets/js' ) );
} );

gulp.task( 'scripts', function() {
	// Load all script files
	return gulp.src( 'resources/assets/js/**/*.js' )

		// Provide some error-catching
		.pipe( plumber() )

		// Concatenate all scripts into one file
		.pipe( concat( 'script.js' ) )

		// Output the concatenated script
		.pipe( gulp.dest( 'public/js/' ) )

		// Minify the script
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( uglify() )

		// Version cache busting
		// .pipe( rev() )

		// Output the minified script
		.pipe( gulp.dest( 'public/js/' ) );

		// Output version manifest
		/* .pipe( rev.manifest( 'rev-manifest.json' , {
			base: 'public',
			merge: true
		} ) )
		.pipe( revdel() )
		.pipe( gulp.dest( 'public' ) ); */
} );

gulp.task( 'watch', function() {
	gulp.watch( 'resources/assets/stylus/**/*.styl', [ 'styles' ] );
	gulp.watch( 'resources/assets/bower/**/*.js', [ 'bower' ] );
	gulp.watch( 'resources/assets/js/**/*.js', [ 'scripts' ] );
} );

gulp.task( 'default', [ 'styles', 'bower', 'scripts', 'watch' ] );