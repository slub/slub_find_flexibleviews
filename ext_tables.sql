#
# Table structure for table 'tx_slubfindflexibleviews_domain_model_flexibleviews'
#
CREATE TABLE tx_slubfindflexibleviews_domain_model_flexibleviews (

	title varchar(255) DEFAULT '' NOT NULL,
	query varchar(255) DEFAULT '' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	image int(11) unsigned NOT NULL default '0',
	link varchar(255) DEFAULT '' NOT NULL,
	slug varchar(255) DEFAULT '' NOT NULL

);
