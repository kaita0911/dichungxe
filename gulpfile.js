const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const path = require('path');
const fs = require('fs');

// Lấy thư mục hiện tại bạn đang chạy gulp (dù gulpfile nằm nơi khác)
const currentDir = process.cwd();
const scssPath = path.join(currentDir, 'assets/scss/**/*.scss');
const cssPath = path.join(currentDir, 'assets/css');

gulp.task('scss', function () {
  if (!fs.existsSync(path.join(currentDir, 'assets/scss'))) {
    console.log('⚠️ Không tìm thấy thư mục assets/scss trong project này.');
    return Promise.resolve();
  }

  return gulp.src(scssPath)
    .pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError))
    .pipe(gulp.dest(cssPath));
});

gulp.task('watch', function () {
  console.log(`👀 Watching SCSS in: ${scssPath}`);
  gulp.watch(scssPath, gulp.series('scss'));
});

gulp.task('default', gulp.series('scss', 'watch'));
