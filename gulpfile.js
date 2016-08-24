var elixir = require('laravel-elixir');
var gulp = require('gulp');
var bootstrapJs = "./node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js";
var bower_dir = "./bower_components";
var public_dir = "./public";

elixir(function (mix) {
    mix.sass('app.scss');
    mix.scripts(['*.js'], './public/js/app.js');
});

gulp.task('copy-pickadate', function () {
    gulp.src(bower_dir + '/pickadate/lib/themes/*')
        .pipe(gulp.dest(public_dir+'/lib/pickadate/themes'));
    gulp.src(bower_dir + '/pickadate/lib/*.js')
        .pipe(gulp.dest(public_dir+'/lib/pickadate/'));
})

gulp.task('copy-jquery', function(){
    gulp.src(bower_dir + '/jquery/dist/+(jquery.js|jquery.min.map)')
        .pipe(gulp.dest(public_dir+'/lib/jquery'));
});

gulp.task('copy-pnotify', function(){
    gulp.src(bower_dir + '/pnotify/dist/*')
        .pipe(gulp.dest(public_dir+'/lib/pnotify'));
});

gulp.task('copy-bootstrap', function(){
    gulp.src(bower_dir + '/bootstrap/dist/*/*')
        .pipe(gulp.dest(public_dir+'/lib/bootstrap'));
});

gulp.task('copy-fontawesome', function(){
    gulp.src(bower_dir + '/font-awesome/+(css|fonts)/*')
        .pipe(gulp.dest(public_dir+'/lib/font-awesome'));
});

gulp.task('copy-pjax', function(){
    gulp.src(bower_dir + '/jquery-pjax/jquery.pjax.js')
        .pipe(gulp.dest(public_dir+'/lib/jquery-pjax'));
});

gulp.task('copy-select2', function(){
    gulp.src(bower_dir + '/select2/dist/css/select2.css')
        .pipe(gulp.dest(public_dir+'/lib/select2/css/'));
    gulp.src(bower_dir + '/select2/dist/js/select2.js')
        .pipe(gulp.dest(public_dir+'/lib/select2/js/'));
    gulp.src(bower_dir + '/select2/dist/js/i18n/en.js')
        .pipe(gulp.dest(public_dir+'/lib/select2/js/i18n'));
});

gulp.task('copy-datatables', function(){
   gulp.src(bower_dir+ '/datatables/media/js/jquery.dataTables.js')
       .pipe(gulp.dest(public_dir+'/lib/datatables/media/js'));
    gulp.src(bower_dir+ '/datatables/media/images/*')
        .pipe(gulp.dest(public_dir+'/lib/datatables/media/images'));
    gulp.src(bower_dir+ '/datatables/media/css/*')
        .pipe(gulp.dest(public_dir+'/lib/datatables/media/css'));
});

gulp.task('copy-modal', function(){
    gulp.src(bower_dir+ '/bootstrap-modal/**/*')
        .pipe(gulp.dest(public_dir+'/lib/bootstrap-modal'));
});
