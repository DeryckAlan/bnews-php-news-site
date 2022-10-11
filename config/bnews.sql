-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Out-2022 às 19:56
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bnews`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(14, 'uncategorized', 'description for category'),
(15, 'Science', 'Description for science category'),
(16, 'Tecnology', 'Description for Tecnology category'),
(17, 'Food', 'Description for Food Category'),
(18, 'Sport', 'Description for Sport category'),
(19, 'Wild Life', 'Description for Wild Life category\r\n'),
(20, 'Military', 'Description for Military category');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `dste_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `dste_time`, `category_id`, `author_id`, `is_featured`) VALUES
(11, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet. Et natus doloribus est dolorum voluptas sit deleniti facilis et atque excepturi sit voluptatem modi in Quis necessitatibus qui natus magni. Sit quia deleniti et alias vel natus excepturi qui velit repellendus aut odit dolore cum nobis reiciendis et laborum nostrum? Et nihil nulla et nobis quis est earum culpa ut voluptatum perferendis qui necessitatibus autem et impedit iste. Aut accusantium maxime non fuga maiores ad aliquam dignissimos in illum facere?\r\n\r\nEt omnis minus quo mollitia porro aut dolores et exercitationem laboriosam qui galisum vero aut eveniet autem. Id magnam amet aut officiis corporis est quis eaque eos omnis repellendus sit enim possimus.\r\n\r\nAut exercitationem omnis vel culpa rerum ad illum impedit et maiores veniam qui officiis repudiandae aut blanditiis et vero dolorum. Qui quod rerum est magni explicabo qui dicta illo est sint suscipit.', '1665509960eiliv-aceron-k9X5yGle-NA-unsplash.jpg', '2022-10-11 17:39:20', 15, 25, 0),
(12, 'Est tempora voluptatem et reiciendis', 'Lorem ipsum dolor sit amet. Et enim dignissimos eos consequuntur distinctio non amet eveniet. Est tempora voluptatem et reiciendis dolor ut nulla mollitia ut atque ipsa aut cupiditate molestiae. Aut odio modi ut tenetur sint et iusto corporis et nulla perferendis non odit dolor?\r\n\r\nSed blanditiis impedit vel doloribus quia et atque quam est veritatis nulla At omnis velit in velit quia. Sed libero voluptatum aut amet optio non sapiente deleniti sed ipsa iusto. Est deleniti quas qui obcaecati autem ut dignissimos animi rem velit eligendi et asperiores voluptas id dolorem consequatur vel animi unde. Ab reprehenderit suscipit est exercitationem atque non aspernatur consequuntur.\r\n\r\nId mollitia aliquid in omnis optio aut dolores consequatur vel sunt reiciendis ad quod dicta est facilis dolorum perspiciatis provident. Rem tempora quam sit omnis veritatis in quis laudantium in dignissimos voluptatem et omnis eligendi eum earum molestias aut animi deleniti. Aut quas molestias est facilis placeat in amet dolorum. Quo omnis distinctio id molestias dolorum est inventore aliquam non dicta atque.\r\n\r\nId fugiat dolores sed laboriosam molestiae qui omnis sint aut officia alias quo blanditiis voluptatem et sint assumenda. Et placeat explicabo nam placeat laboriosam et facere unde.', '1665510144tobias-tullius-IiE50WMRa7I-unsplash.jpg', '2022-10-11 17:42:24', 19, 25, 0),
(13, 'Quo perspiciatis cumque ea similique', 'Lorem ipsum dolor sit amet. Aut quia nihil qui tempore maiores et error placeat non rerum ipsam. Qui nulla necessitatibus cum dolores repellat qui aliquam ratione.\r\n\r\nNon fuga dolor aut odio debitis aut placeat eaque ex maiores sunt et nihil libero cum consequatur magnam ut voluptatem accusantium. Ut ratione atque 33 quia dolor consequatur libero aut laborum ducimus! Sed blanditiis galisum vel laudantium libero et recusandae pariatur.\r\n\r\nAb magnam suscipit qui quia excepturi aut omnis labore. Sit praesentium quidem et quia exercitationem sit architecto necessitatibus aut omnis expedita! Qui sint nulla id nihil facilis vel dignissimos aliquid. Ex quisquam voluptas id explicabo quia est itaque dolor vel provident libero quo quia accusamus ex deleniti dignissimos et architecto itaque.', '1665510318emilio-garcia-AWdCgDDedH0-unsplash.jpg', '2022-10-11 17:45:18', 18, 25, 0),
(14, 'Et maxime dolore qui asperiores', 'Lorem ipsum dolor sit amet. Aut galisum laboriosam aut quaerat similique eos tempora ratione quo laboriosam deserunt? Ad quia unde ea eius perferendis qui dolores quaerat ut vero eum voluptatem nemo sit voluptatem explicabo. Recusandae voluptas nam quia consectetur nam omnis rerum qui sunt quos aut similique dicta! Ut aliquid ullam id facilis nesciunt ut beatae culpa vel temporibus velit sit voluptatem odit sit incidunt incidunt qui expedita nihil. Cum numquam quidem id quam perferendis ut internos reiciendis eum consequuntur provident. Qui voluptatem inventore ut labore deleniti vel beatae aperiam. Ut eius laudantium sit unde harum ut veritatis corporis qui nostrum consequuntur eos incidunt velit At quia omnis.\r\n\r\nSed internos vero qui quae quia et numquam sapiente et minus excepturi hic dignissimos labore. Eum quae asperiores sit deserunt molestiae a omnis repudiandae At obcaecati internos sit tenetur labore? Qui repellat repellat eos debitis aperiam ut molestias reiciendis qui enim possimus ea ipsum quas. Non ipsa distinctio vel itaque quia qui reiciendis consequatur et quibusdam nobis. Et autem distinctio eos nisi nisi qui eius harum aut suscipit enim. Qui aperiam numquam qui nostrum esse et nobis debitis et eaque amet in officiis rerum qui consequatur esse! Non quos incidunt qui officia mollitia est labore provident sit amet deserunt aut eligendi quia ut enim dolorum.', '1665510463alexandre-debieve-FO7JIlwjOtU-unsplash.jpg', '2022-10-11 17:47:43', 16, 25, 0),
(15, 'Non fuga voluptas ad possimus', 'Lorem ipsum dolor sit amet. Sed suscipit nesciunt est odit voluptas sit molestias dolores ut adipisci tempore. Et recusandae reiciendis et voluptatem assumenda ad numquam sint et amet debitis eos consequuntur numquam et animi amet ut voluptas voluptates. Qui quia maiores ut illum vitae est tempora rerum et deserunt et quae optio sed mollitia voluptates. Et velit quia aut ratione ut dolor nobis qui voluptate beatae ut inventore quaerat quo enim adipisci et iusto nihil!\r\n\r\nUt voluptatem iusto et tempore atque est dolor nesciunt et dolores atque est nihil enim eos amet iusto! Vel illum nihil cum dolore maxime aut provident eveniet non mollitia dolores aut temporibus tenetur et quae itaque aut asperiores harum. Eum maxime similique et molestias dolorum sed minima dolor rem sint commodi At sunt optio eos error ullam ut rerum quasi. Aut aspernatur quia hic harum nihil non inventore atque qui quae atque.\r\n\r\nNon fuga voluptas ad possimus sint et adipisci illum aut optio veniam. In galisum ullam non quisquam rerum eos sequi aspernatur.', '1665510600don-jackson-wyatt-b9cU8k3VZNM-unsplash (1).jpg', '2022-10-11 17:50:00', 20, 25, 0),
(16, 'Sed provident dolor id galisum', 'Lorem ipsum dolor sit amet. Sit quia corrupti non totam quia non dicta molestiae aut internos quaerat ea suscipit magnam fugiat et dolor quia. Eum nobis voluptatem aut voluptatem numquam At rerum deserunt ut placeat possimus sit odit pariatur sit accusamus quis ea reiciendis similique.\r\n\r\nAb natus reprehenderit a aliquid dolore qui maxime nihil. Ea nemo debitis aut omnis mollitia At recusandae ipsam.\r\n\r\nIn earum maxime eos dolor qui placeat iusto. Est recusandae tempora ut galisum assumenda sed dolorum nesciunt qui necessitatibus asperiores. Sed provident dolor id galisum porro hic deleniti excepturi 33 voluptatum incidunt!', '1665510792jieyuan-kan-Qjl6jO_wbMY-unsplash.jpg', '2022-10-11 17:53:12', 20, 25, 0),
(17, 'Qui magnam vitae et omnis', 'Lorem ipsum dolor sit amet. At consequatur molestiae est nihil Quis et quod aspernatur aut omnis rerum et voluptas rerum est veritatis galisum. Ab commodi unde id odio consectetur sed provident quam eos unde facere sit officiis aspernatur. Quo internos consectetur et rerum consequatur ea expedita dolores quo molestiae quia ea repellat maxime.\r\n\r\nEst molestiae ducimus maxime alias rem veniam culpa ut voluptas aspernatur. Qui magnam vitae et omnis distinctio ut culpa quaerat.\r\n\r\nQui galisum tenetur cum similique officia et perspiciatis distinctio! Et sunt sunt qui ipsum culpa non corporis magni. Et debitis optio ut dolor veniam ab galisum alias iure totam.', '1665510882christopher-alvarenga-3osGqRRtQBE-unsplash.jpg', '2022-10-11 17:54:42', 19, 25, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(25, 'master', 'user', 'master', 'master@email.com', '$2y$10$.dHDXQ6ArYJwMe3Z5g7/AeLFLUiFReNHkHzK/yl3XgbEkT7Vs7mSO', '1665509033avatar1.jpg', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_bnews_category` (`category_id`),
  ADD KEY `FK_bnews_author` (`author_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_bnews_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_bnews_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
