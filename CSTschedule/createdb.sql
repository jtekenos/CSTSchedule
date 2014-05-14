DROP DATABASE forum;
CREATE DATABASE forum;

USE forum;

CREATE TABLE schedule (
  id INTEGER NOT NULL auto_increment,
  eventname varchar(255) default '' NOT NULL ,
  location longtext NOT NULL,
  timefrom varchar(32) NOT NULL default '',
  timeto varchar(32) NOT NULL default '',
  instructor varchar(255) default '' NOT NULL ,
  level_id integer(100) default NULL,
  day integer(100) default NULL,
  datetime varchar(25) NOT NULL default '',
  PRIMARY KEY (id),
  FOREIGN KEY (level_id) REFERENCES levels(id)    ON DELETE CASCADE
) ENGINE=MyISAM;


CREATE TABLE members (
  member_id INTEGER NOT NULL auto_increment,
  level_id integer(100) default NULL,  
  email varchar(100) NOT NULL default '',
  passwd varchar(32) NOT NULL default '',
  notify varchar(32) NOT NULL default '',  
  datetime varchar(25) NOT NULL default '',
  PRIMARY KEY (member_id),
  FOREIGN KEY (level_id) REFERENCES levels(id)    ON DELETE CASCADE
) ENGINE=MyISAM;

