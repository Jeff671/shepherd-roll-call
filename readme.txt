先安裝heroku CLI 跟 git


之後要先連上heroku
heroku login


1.git init
2.heroku git:remote -a 專案名稱(minwtapp)
3.git add .  //'.'是指全部上傳 也可打指定名子 例:test.php
4.git commit -m "這裡隨便打"
5.git push heroku master //開始上傳與布署
git add test2.php
git commit -m "test"
git push heroku master

//offical for H44

git init
heroku git:remote -a hall44-visitrollcall
git add .
git commit -m "a"
git push heroku master


//offical for H22

git init
heroku git:remote -a hall22-visit-record
git add .
git commit -m "a"
git push heroku master


//test

git init
heroku git:remote -a justwonnatestit
git add .
git commit -m "a"
git push heroku master