CREATE TABLE tx_nsmobile_domain_model_mobile (
	image int(11) unsigned NOT NULL DEFAULT '0',
	price int(11) NOT NULL DEFAULT '0',
	feature text,
	model int(11) unsigned DEFAULT '0',
	brand int(11) unsigned DEFAULT '0',
	slug varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_nsmobile_domain_model_technology (
	technology_name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_nsmobile_domain_model_model (
	model_name varchar(255) NOT NULL DEFAULT '',
	ram varchar(255) NOT NULL DEFAULT '',
	rom varchar(255) NOT NULL DEFAULT '',
	accessories text NOT NULL,
	technology int(11) unsigned DEFAULT '0',
	slug varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_nsmobile_domain_model_brand (
	brand_name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_nsmobile_domain_model_accessories (
	name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_nsmobile_domain_model_mobile (
		tx_nsmobile_options int(11) DEFAULT '0' NOT NULL,
		tx_nsmobile_special varchar(255) DEFAULT '' NOT NULL
);

CREATE TABLE tt_content (
		tx_nsmobile_noprint tinyint(4) DEFAULT '0' NOT NULL
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder