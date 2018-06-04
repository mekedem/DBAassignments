
create database sea;



CREATE TABLE `userprofile` (
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
);

CREATE TABLE `blogpost` (
  'id' (auto-increment),`title` varchar(100) DEFAULT NULL,
  `description` varchar(2000), 'date' varchar(100) DEFAULT NULL
);

works on wamp server the blog - http://localhost/NewsFetch/view/blogg.php
to post news use home in http://localhost/NewsFetch/view.home