SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `becode`
--

-- --------------------------------------------------------

--
-- Structure de la table `hiking`
--

CREATE TABLE `hiking` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `difficulty` char(30) NOT NULL,
  `distance` decimal(5,1) NOT NULL,
  `duration` time NOT NULL,
  `height_difference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hiking`
--
ALTER TABLE `hiking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hiking`
--
ALTER TABLE `hiking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


INSERT INTO hiking (name, difficulty, distance, duration, height_difference)
 VALUES
 ('Aurère par le Sentier Scout depuis le Bélier', ' Difficile', '17.8 km', '1200 m'),
 ('La boucle du Col des Bœufs à Marla par la Nouvelle', 'Difficile', '18.9 km', '1300 m'),
 ('La Roche Ecrite depuis Mamode Camp', 'Moyen', '18.6 km', '1100 m'),
 ('Une boucle vers Grand Bassin par Bois Court et le Sentier Mollaret', 'Difficile', '13.9 km', '1050 m'),
 ('Le Sentier de la Chapelle depuis Cilaos', ' Difficile', '8 km', '700 m');
