
CREATE TABLE IF NOT EXISTS `spell` (
  `spl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `spl_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spl_systeem` int(10) unsigned DEFAULT '3',
  `spl_castingtime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spl_range` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spl_effecttype` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spl_effect` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spl_duration` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spl_savingthrow` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `spl_spellresistance` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `spl_components` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spl_material` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `spl_world` int(10) unsigned DEFAULT NULL,
  `spl_shortdescription` varchar(128) DEFAULT NULL,
  `spl_mediumdescription` text,
  `spl_longdescription` text,
  `spl_img` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`spl_id`),
  KEY `spl_name` (`spl_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3379 ;

CREATE TABLE IF NOT EXISTS `spell` (
  `spl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `spl_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spl_shortdescription` varchar(128) DEFAULT NULL,
  `spl_longdescription` text,
  PRIMARY KEY (`spl_id`),
  KEY `spl_name` (`spl_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


INSERT INTO `spell` (`spl_id`, `spl_name`, `spl_shortdescription`, `spl_longdescription`) VALUES
(399, 'Ability Rip', 'Rips a supernatural ability from one creature and transfer it to another.', ''),
(400, 'Ablative Armor', 'Reduce damage from next attack by 5 + caster level (max 15).', ''),
(401, 'Aboleth Curse', 'Subject''s skin undergoes a horrible transformation.', ''),
(402, 'Abolish Shadows', 'Shadow creatures take 1d6/level damage, shadow and darkness spells might be dispelled.', 'Shadow creatures take 1d6/level damage, shadow and darkness spells might be dispelled.');
