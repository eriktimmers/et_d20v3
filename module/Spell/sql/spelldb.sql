CREATE TABLE IF NOT EXISTS `gamesystem` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8;

--
-- Gegevens worden uitgevoerd voor tabel `systeem`
--

INSERT INTO `gamesystem` (`id`, `name`) VALUES
(3, 'Dungeons & Dragons 3.5'),
(5, 'D20 Modern'),
(6, 'Pathfinder');



CREATE TABLE IF NOT EXISTS `spell` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `systeem` int(10) unsigned DEFAULT '3',
  `castingtime` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `range` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `effecttype` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `effect` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `savingthrow` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `spellresistance` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `components` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `material` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `world` int(10) unsigned DEFAULT NULL,
  `shortdescription` varchar(128) DEFAULT NULL,
  `mediumdescription` text,
  `longdescription` text,
  `img` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3379 ;

INSERT INTO `spell` (`id`, `name`, `systeem`, `castingtime`, `range`, `effecttype`, `effect`, `duration`, `savingthrow`, `spellresistance`, `components`, `material`, `world`, `shortdescription`, `mediumdescription`, `longdescription`, `img`) VALUES
(1, 'Locate Portal', 2, '10 min', '100 yards from crystal shell', 'Area', 'Crystal sphere', 'Instantaneous', '', '', 'V, S, M', 'conch shell', 1, 'Find the nearest portal', '', '', NULL),
(2, 'Create Air', 2, '2 rounds', '90 ft', 'Effect', 'Bubble of fresh air', 'Permanent', NULL, NULL, 'V, S, M, DF', 'small stoppered flask', 1, 'Create bubble of fresh air', NULL, NULL, NULL),
(399, 'Ability Rip', 3, '1 hour', 'Touch', 'Targets', 'Two living creatures', '1 hour/level', 'Fortitude negates; see text', 'Yes', 'V, S, M', '', 2, 'Rips a supernatural ability from one creature and transfer it to another.', '', '', NULL),
(400, 'Ablative Armor', 3, '1 minute', 'Touch', 'Target', 'Suit of armor touched', '10 min./level', 'None (Object)', 'No (object)', 'S, M', NULL, 3, 'Reduce damage from next attack by 5 + caster level (max 15).', '', '', NULL),
(401, 'Aboleth Curse', 3, '1 standard action', 'Touch', 'Target', 'Living creature touched', 'Permanent', 'Fortitude negates', 'Yes', 'V, S, M', NULL, NULL, 'Subject''s skin undergoes a horrible transformation.', '', '', NULL),
(402, 'Abolish Shadows', 3, '1 standard action', '30 ft.', 'Area', '30-ft.-radius burst, centered on you', 'Instantaneous', 'Fortitude half; see text', 'Yes', 'V, S, M', NULL, 2, 'Shadow creatures take 1d6/level damage, shadow and darkness spells might be dispelled.', 'Shadow creatures take 1d6/level damage, shadow and darkness spells might be dispelled.', '', NULL),
(403, 'Absorb Mind', 3, '1 standard action', 'Personal', 'Target', 'You', '1 min./level', '', '', 'V, S, F, Corrupt', NULL, NULL, 'You gain 25% chance of knowing information in a brain eaten.', '', '', NULL),
(404, 'Absorb Strength', 3, '1 standard action', 'Personal', 'Target', 'You', '10 min./level', '', '', 'V, S, F, Corrupt', NULL, NULL, 'You gain 1/4 of a creature''s Str and Con when he eats it.', '', '', NULL),
(405, 'Absorb Weapon', 3, '1 standard action', 'Touch', 'Effect', 'One touched weapon not in another creature''s possession', '1 hour/level (D)', 'Will negates (object)', 'Yes (object)', 'V, S', '', 0, 'Hides a weapon inside your arm.', '', '', '92168.jpg'),
(406, 'Absorption', 3, '1 standard action', 'Personal', 'Target', 'You', '10 min./level or until expended', '', '', 'V, S', NULL, NULL, 'You absorb 1d4+6 spell levels directed at you.', '', '', NULL),
(407, 'Abyssal Army', 3, '10 minutes', 'Medium (100 ft. + 10 ft./level)', 'Effect', 'Two or more summoned creatures, no two of which can be more than 30 ft. apart', '10 min./level (D)', 'None', 'No', 'V, S', NULL, NULL, 'Summons demons to fight for you.', '', '', NULL),
(408, 'Abyssal Might', 3, '1 standard action', 'Personal', 'Target', 'You', '10 min./level', '', '', 'V, S, M, Demon', NULL, NULL, 'You gain +2 to Str, Con, Dex, and SR.', '', '', NULL),
(409, 'Accelerated Movement', 3, '1 swift action', 'Personal', 'Target', 'You', '1 round/level (D)', '', '', 'S, M', NULL, NULL, 'Swift. Balance, Climb, Hide, Move Silently, and Tumble at normal speed with no penalty on skill check.', '', '', NULL),
(410, 'Accuracy', 3, '1 standard action', 'Touch', 'Target', 'One thrown weapon/level touched or one projectile weapon touched', '10 min./level', 'Will negates (harmless, object)', 'Yes (harmless, object)', 'V, S, M', NULL, NULL, 'Doubles ranged weapon''s range increments.', '', '', NULL),
(411, 'Acid Arrow', 3, '1 standard action', 'Long (400 ft. + 40 ft./level)', 'Effect', 'One arrow of acid', '1 round + 1 round/3 levels', 'None', 'No', 'V, S, M, F', NULL, NULL, 'Ranged touch attack; 2d4 damage for 1 round +1 round/three levels.', 'Ranged touch attack; 2d4 acid damage for 1 round +1 round/three levels.', 'A magical arrow of acid springs from your hand and speeds to its target. You must succeed on a ranged touch attack to hit your target. The arrow deals 2d4 points of acid damage with no splash damage. For every three caster levels (to a maximum of 18th), the acid, unless somehow neutralized, lasts for another round, dealing another 2d4 points of damage in that round.', NULL),
(412, 'Acid Breath', 3, '1 standard action', '15 ft.', 'Area', 'Cone-shaped burst', 'Instantaneous', 'Reflex half', 'Yes', 'V, S, M', '', 0, 'Cone of acid deals 1d6 damage/level.', '1d6/caster level acid damage in a cone.', '', '92180.jpg'),
(413, 'Acid Dart', 3, '1 standard action', 'Close (25 ft. + 5 ft./2 levels)', 'Effect', 'Dart of acid', 'Instantaneous', 'None', 'Yes', 'V, S', NULL, NULL, 'Energy bolt deals 1d3 acid damage.', '', 'You fire a small dart made of acid at the target, requiring a successful ranged touch attack. The spell deals 1d3 acid damage and no splash damage.', NULL),
(414, 'Acid Fog', 3, '1 standard action', 'Medium (100 ft. + 10 ft./level)', 'Effect', 'Fog spreads in 20-ft. radius, 20 ft. high', '1 round/level', 'None', 'No', 'V, S, M/DF', '', 0, 'Fog deals acid damage.', 'Fog deals 2d6 acid damage per round.', 'Acid fog creates a billowing mass of misty vapors similar to that produced by a solid fog spell. In addition to slowing creatures down and obscuring sight, this spell''s vapors are highly acidic. Each round on your turn, starting when you cast the spell, the fog deals 2d6 points of acid damage to each creature and object within it.', '');