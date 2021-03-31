-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: mysql669.umbler.com
-- Generation Time: 03-Jan-2021 às 11:09
-- Versão do servidor: 5.6.40
-- PHP Version: 5.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `englishforfriend`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `cards_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `car_publico` int(11) DEFAULT NULL,
  `car_texto` longtext,
  `car_traducao` longtext,
  `car_audio` varchar(45) DEFAULT NULL,
  `car_img` varchar(255) DEFAULT NULL,
  `car_img_traducao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cards`
--

INSERT INTO `cards` (`cards_id`, `usuarios_id`, `car_publico`, `car_texto`, `car_traducao`, `car_audio`, `car_img`, `car_img_traducao`) VALUES
(1, 10, 1, '<p>Do you and your flatmate <strong>get along</strong>?</p>', '<p>Voc&ecirc; e seu colega de casa <strong>se d&atilde;o bem</strong>?</p>', NULL, NULL, NULL),
(2, 10, 1, '<p>I live with a <strong>disability </strong>called cerebral palsy</p>', '<p>Eu vivo com uma <strong>defici&ecirc;ncia </strong>chamada paralisia cerebral</p>', NULL, NULL, NULL),
(3, 10, 1, '<p>I can do anything to help you <strong>get over</strong>, Lester</p>', '<p>Eu posso fazer qualquer coisa pra te ajudar a <strong>superar</strong>, Lester</p>', NULL, NULL, NULL),
(4, 10, NULL, '<p>This will in fact <strong>strengthen </strong>the message that we are trying to <strong>get across</strong></p>', '<p>Isso ir&aacute;&nbsp;<strong>refor&ccedil;ar</strong> a imagem que estamos tentando&nbsp;<strong>transmitir</strong></p>', NULL, NULL, NULL),
(5, 10, 1, '<p>This card is about challenge, <strong>endurance</strong> and compromise</p>', '<p>Esse cart&atilde;o &eacute; sobre desafio,&nbsp;<strong>resist&ecirc;ncia</strong> e compromisso</p>', NULL, NULL, NULL),
(6, 10, 1, '<p>My&nbsp;<strong>nephew</strong> is using drugs</p>', '<p>Meu&nbsp;<strong>sobrinho</strong> est&aacute; usando drogas</p>', NULL, NULL, NULL),
(7, 10, 1, '<p>Over the years we have seen irregularities&nbsp;<strong>decrease</strong> significantly.</p>', '<p>Ao longo dos anos n&oacute;s temos visto uma&nbsp;<strong>diminui&ccedil;&atilde;o</strong> das irregularidades significativamente</p>', NULL, NULL, NULL),
(8, 10, 1, '<p>Look how tired you are from&nbsp;<strong>chasing,</strong> Keith</p>', '<p>Olhe o qu&atilde;o cansado voc&ecirc; est&aacute; de perseguir, Keith</p>', NULL, NULL, NULL),
(9, 10, 1, '<p>We would like to&nbsp;<strong>split</strong> the bill</p>', '<p>N&oacute;s gostar&iacute;amos de <strong>dividir </strong>a conta</p>', NULL, NULL, NULL),
(10, 10, 1, '<p>I didn''t <strong>devote </strong>enough time to preparing my speech</p>', '<p>eu n&atilde;o <strong>dediquei </strong>tempo suficiente para preparar meu discurso</p>', NULL, NULL, NULL),
(11, 10, 1, '<p>I''m still a little&nbsp;<strong>foggy,</strong> but that sounds crazy</p>', '<p>Eu ainda estou um pouco <strong>confuso</strong>, mas isso parece louco</p>', NULL, NULL, NULL),
(12, 10, 1, '<p>Look forward <strong>beyond </strong>your fingertips</p>', '<p>Olhe p frente <strong>al&eacute;m </strong>da ponta dos seus dedos</p>', NULL, NULL, NULL),
(13, 10, 1, '<p>The rent is&nbsp;<strong>due&nbsp;</strong>tomorrow</p>', '<p>O aluguel&nbsp;<strong>vence&nbsp;</strong>amanh&atilde;</p>', NULL, NULL, NULL),
(14, 10, 1, '<p>Don''t&nbsp;<strong>drag&nbsp;</strong>me into this</p>', '<p>N&atilde;o me <strong>arraste </strong>pra isso</p>', NULL, NULL, NULL),
(15, 10, 1, '<p>How are you&nbsp;<strong>getting by</strong> these days?</p>', '<p>Como voc&ecirc; est&aacute;&nbsp;<strong>sobrevivendo</strong> esses dias?</p>', NULL, NULL, NULL),
(16, 10, 1, '<p>He&nbsp;<strong>copes</strong> difficult activities</p>', '<p>Ele&nbsp;<strong>lida&nbsp;</strong>com atividades dif&iacute;ceis</p>', NULL, NULL, NULL),
(17, 10, 1, '<p>To smoke cigarettes&nbsp;<strong>harm</strong> health</p>', '<p>Fumar cigarros&nbsp;<strong>prejudica</strong> &agrave; sa&uacute;de</p>', NULL, NULL, NULL),
(18, 10, NULL, '<p><strong>Chart </strong>metods is applied during the course</p>', '<p>Os m&eacute;todos de&nbsp;<strong>gr&aacute;fico</strong> s&atilde;o aplicados durante o curso.</p>', NULL, NULL, NULL),
(19, 10, 1, '<p>He asks to&nbsp;<strong>borrow</strong> some money</p>', '<p>Ele pede p&nbsp;<strong>emprestar</strong> algum dinheiro</p>', NULL, NULL, NULL),
(20, 10, 1, '<p>The company&nbsp;<strong>asserts</strong> that&nbsp;<strong>downsizing</strong> is necessary</p>', '<p>A empresa <strong>afirma </strong>que <strong>demiss&otilde;es </strong>s&atilde;o necess&aacute;rias</p>', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards_categorias`
--

CREATE TABLE IF NOT EXISTS `cards_categorias` (
  `cards_categorias_id` int(11) NOT NULL,
  `car_cat_nome` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forum_conteudos`
--

CREATE TABLE IF NOT EXISTS `forum_conteudos` (
  `forum_conteudos_id` int(11) NOT NULL,
  `for_con_titulo` varchar(45) DEFAULT NULL,
  `for_con_texto` mediumtext,
  `for_con_link` varchar(255) DEFAULT NULL,
  `forum_tipos_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `for_con_data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `for_con_traducao` mediumtext,
  `for_con_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `forum_conteudos`
--

INSERT INTO `forum_conteudos` (`forum_conteudos_id`, `for_con_titulo`, `for_con_texto`, `for_con_link`, `forum_tipos_id`, `usuarios_id`, `for_con_data_cadastro`, `for_con_traducao`, `for_con_status`) VALUES
(3, NULL, '<p>A <strong>former staffer</strong>&nbsp;came by and he comes through the South Lawn</p>', NULL, 1, 10, '2020-07-15 10:37:26', '<p>Um <strong>ex-funcion&aacute;rio</strong> veio e ele veio atrav&eacute;s do gramado sul</p>', 1),
(4, NULL, '<p>They call you&nbsp;<strong>renegade,</strong> right?</p>', NULL, 1, 10, '2020-07-15 10:40:42', '<p>Eles te chamam de <strong>renegado</strong>, certo?</p>\r\n<p>Algu&eacute;m rebelde ou com um comportamento inapropriado</p>', 1),
(5, NULL, '<p>&nbsp;because you''re <strong>tooling around</strong> in an electric car</p>', NULL, 1, 10, '2020-07-15 10:42:01', '<p>Phrasal verb que significa dirigir de uma maneira engra&ccedil;ada</p>', 1),
(6, NULL, '<p>we need to <strong>set up</strong> a meeting</p>', NULL, 1, 10, '2020-07-15 10:45:17', '<p>n&oacute;s precisamos agendar uma reuni&atilde;o</p>\r\n<p>Phrasal verb bem comum pra preparar ou organizar algo</p>', 1),
(7, NULL, '<p>Will you <strong>get rid</strong> of daylight saving time?</p>', NULL, 1, 10, '2020-07-15 10:53:03', '<p>Voc&ecirc; vai <strong>se livrar</strong> do hor&aacute;rio de ver&atilde;o</p>', 1),
(8, 'ERROS COMUNS EM INGLÊS', NULL, 'https://www.youtube.com/embed/OJMEnyhzqbk', 5, 1, '2020-07-18 18:37:40', NULL, 1),
(9, NULL, '<p>In the <strong>old Italian town of Atri,&nbsp;</strong></p>', NULL, 1, 1, '2020-07-18 18:54:27', '<p>Na <strong>antiga cidade italiana de Atri,&nbsp;</strong></p>', 1),
(10, NULL, '<p>the King bought <strong>a fine, large bell&nbsp;</strong></p>', NULL, 1, 1, '2020-07-18 18:55:11', '<p>o Rei comprou <strong>um sino grande e elegante&nbsp;</strong></p>', 1),
(11, NULL, '<p>and <strong>hung it</strong> in the marketplace tower.&nbsp;</p>', NULL, 1, 1, '2020-07-18 18:55:45', '<p>e <strong>o pendurou</strong> na torre da feira.&nbsp;</p>', 1),
(12, NULL, '<p><strong>A long rope that reached the ground</strong> was attached to the bell.&nbsp;</p>', NULL, 1, 1, '2020-07-18 18:56:07', '<p><strong>Uma longa corda que chegava ao ch&atilde;o</strong> foi presa ao sino.&nbsp;&nbsp;</p>', 1),
(13, NULL, '<p><strong>The smallest child could ring the bell</strong> by pulling the rope.&nbsp;</p>', NULL, 1, 1, '2020-07-18 18:56:42', '<p><strong>A menor das crian&ccedil;as podia tocar o sino</strong> ao puxar a corda.&nbsp;</p>', 1),
(14, NULL, '<p><strong>"It shall be the Bell of Justice,"</strong> said the King.&nbsp;</p>', NULL, 1, 1, '2020-07-18 18:57:11', '<p><strong>"(Isso) ser&aacute; o Sino da Justi&ccedil;a",</strong> disse o Rei.&nbsp;</p>', 1),
(15, NULL, '<p><strong>The bell gave the people of Atri </strong>cause for a great holiday.&nbsp;</p>', NULL, 1, 1, '2020-07-18 18:57:35', '<p><strong>O sino deu ao povo de Atri</strong> motivo para um grande feriado.&nbsp;&nbsp;</p>', 1),
(16, NULL, '<p><strong>Everyone came to the marketplace</strong> to admire the Bell of Justice.&nbsp;</p>', NULL, 1, 1, '2020-07-18 18:57:58', '<p><strong>Todos vieram &agrave; feira </strong>para admirar o Sino da Justi&ccedil;a.&nbsp;</p>', 1),
(17, NULL, '<p><strong>"Perhaps the King will ring it,"</strong> said the people,&nbsp;</p>', NULL, 1, 1, '2020-07-18 18:58:19', '<p><strong>"Talvez o Rei vai tocar o sino", </strong>disse o povo,&nbsp;</p>', 1),
(18, NULL, '<p>waiting to see <strong>what the King would do.&nbsp;</strong></p>', NULL, 1, 1, '2020-07-18 18:58:47', '<p>esperando para ver <strong>o que o Rei faria.&nbsp;</strong></p>', 1),
(19, NULL, '<p>Andrew is being so <strong>unreasonable</strong>, as always.</p>', NULL, 1, 10, '2020-07-21 09:51:21', '<p>Andrew est&aacute; sendo t&atilde;o irracional, como sempre</p>', 1),
(20, NULL, '<p>She<strong> fires off</strong> a text to her boyfriend</p>', NULL, 1, 10, '2020-07-21 09:58:48', '<p>Ela <strong>mandou/disparou</strong> uma mensagem para seu namorado</p>', 1),
(21, NULL, '<p>I&rsquo;m distracted, <strong>stabbing away</strong> at the keys on my phone</p>', NULL, 1, 10, '2020-07-21 10:25:31', '<p>Estou distra&iacute;do, <strong>apunhalando</strong> as teclas do meu telefone</p>', 1),
(22, NULL, '<p>While<strong> sounding off</strong> to Yasmin as she drives down the <strong>rain-drenched</strong> streets.</p>', NULL, 1, 10, '2020-07-21 10:32:19', '<p>Enquanto falo para Yasmin enquanto ela dirige pelas ruas <strong>encharcadas</strong>.</p>', 1),
(23, NULL, '<p>They feel unusually <strong>clumsy</strong> and I nearly drop the phone into the <strong>footwell</strong>.</p>\r\n<p>&nbsp;</p>', NULL, 1, 10, '2020-07-21 10:35:01', '<p>Eles se sentem estranhamente <strong>desajeitados </strong>e eu quase largo o telefone na<strong> zona dos p&eacute;s</strong>.</p>', 1),
(24, NULL, '<p>i <strong>thump out</strong> the text message to my boyfriend Stuart</p>', NULL, 1, 10, '2020-07-21 10:41:14', '<p>eu <strong>"bati"</strong> a mensagem de texto para o meu namorado Stuart</p>\r\n<p>&eacute; tipo mandar de qualquer jeito</p>', 1),
(25, NULL, '<p>Yasmin <strong>sulks</strong>, her thick brows <strong>drawn tightly</strong>.</p>', NULL, 1, 10, '2020-07-21 11:11:39', '<p>Yasmin fica de <strong>mau humor</strong>, as sobrancelhas grossas <strong>contra&iacute;das</strong>.</p>', 1),
(26, NULL, '<p>I&rsquo;m so <strong>pale </strong>and uninteresting in comparison. Even in the summer I never <strong>tan</strong>.</p>', NULL, 1, 10, '2020-07-21 11:16:41', '<p>Eu sou t&atilde;o p&aacute;lida e desinteressante em compara&ccedil;&atilde;o a ela. Mesmo no vers&atilde;o eu nunca me <strong>bronzeei</strong></p>', 1),
(27, NULL, '<p>Her boss, Tracey, is fun and fair and would never <strong>pull a stunt</strong> like Andrew.</p>', NULL, 1, 10, '2020-07-21 11:18:11', '<p>O chefe dela, Tracey, &eacute; engra&ccedil;ado e justo e nunca <strong>daria um golpe </strong>como Andrew.</p>', 1),
(28, NULL, '<p>The rain <strong>slashes down</strong> and the wind shakes Yasmin&rsquo;s little Fiat</p>', NULL, 1, 10, '2020-07-21 11:20:51', '<p>A chuva <strong>diminui </strong>e o vento balan&ccedil;a o pequeno Fiat de Yasmin</p>', 1),
(29, NULL, '<p>She has to <strong>clasp </strong>the <strong>wheel </strong>tightly, her <strong>knuckles </strong>turning white.</p>', NULL, 1, 10, '2020-07-21 11:21:49', '<p>Ela tem que apertar o volante com for&ccedil;a, os <strong>n&oacute;s dos dedos</strong> ficando brancos.</p>', 1),
(30, NULL, '<p>She jokes that she&rsquo;s always been a <strong>late bloomer</strong>,</p>', NULL, 1, 10, '2020-07-21 13:51:03', '<p>Ela brinca que ela sempre teve um in&iacute;cio tardio</p>', 1),
(31, NULL, '<p>her eyes <strong>flickering downwards </strong>and then back to the road.</p>', NULL, 1, 10, '2020-07-21 13:52:31', '<p>Os olhos dela <strong>tremulam para baixo</strong> e ent&atilde;o voltam a estrada</p>', 1),
(32, NULL, '<p>She looks <strong>delighted </strong>to be the one to <strong>impart </strong>this piece of office <strong>gossip</strong>.</p>', NULL, 1, 10, '2020-07-21 14:06:25', '<p>Ela parece <strong>encantada </strong>em ser a &uacute;nica a <strong>transmitir </strong>essa fofoca de escrit&oacute;rio</p>', 1),
(33, NULL, '<p>I can&rsquo;t imagine her<strong> striking up</strong> the courage to walk out on Andrew.</p>', NULL, 1, 10, '2020-07-21 14:12:14', '<p>Eu n&atilde;o consigo imagina-la criando coragem para abandonar Andrew</p>', 1),
(34, NULL, '<p>Apparently he&rsquo;s been <strong>shagging </strong>Lucinda.</p>', NULL, 1, 10, '2020-07-21 14:13:08', '<p>Apaentemente ele est&aacute; transando com lucinda</p>', 1),
(35, NULL, '<p>I <strong>shrug</strong></p>', NULL, 1, 10, '2020-07-21 14:14:02', '<p>Eu dou de ombros</p>', 1),
(36, NULL, '<p>Our <strong>dustbin </strong>has fallen over in the wind and is rolling around on the <strong>pavement </strong>like a drunk.</p>', NULL, 1, 10, '2020-07-21 14:19:21', '<p>Nossa <strong>lata de lixo</strong> caiu ao vento e est&aacute; rolando na <strong>cal&ccedil;ada </strong>como um b&ecirc;bado.</p>', 1),
(37, NULL, '<p>I <strong>glance down</strong> at the phone in my <strong>lap</strong>.</p>', NULL, 1, 10, '2020-07-21 14:23:07', '<p>Eu olhei de relance para o celular em meu colo</p>', 1),
(38, NULL, '<p>When he is <strong>pervading </strong>the place with the comforting smells of cottage pie</p>', NULL, 1, 10, '2020-07-21 14:27:06', '<p>Quando ele est&aacute; <strong>invadindo </strong>o lugar com o cheiro ''reconfortante'' de torta</p>', 1),
(39, NULL, '<p>I <strong>rummage </strong>in my bag for my umbrella</p>', NULL, 1, 10, '2020-07-21 14:37:40', '<p>Eu <strong>remexo </strong>minha mochila procurando pelo meu guarda-chuva...</p>', 1),
(40, NULL, '<p>I wake up the next morning with my stomach <strong>churning</strong></p>', NULL, 1, 10, '2020-07-21 14:47:01', '<p>eu acordei na manh&atilde; seguinte com meu est&ocirc;mago <strong>revirando</strong></p>', 1),
(41, NULL, '<p>How can he be so <strong>jolly </strong>after what happened last night?</p>', NULL, 1, 10, '2020-07-21 14:49:25', '<p>Como ele pode estar t&atilde;o <strong>feliz </strong>depois do que aconteceu na &uacute;ltima noite?</p>', 1),
(42, NULL, '<p>I&rsquo;d accused him of being secretly pleased that my weekend away might be <strong>scuppered</strong></p>', NULL, 1, 10, '2020-07-21 14:52:12', '<p>Eu o acusei de estar secretamente satisfeito que meu final de semana fora pode ser <strong>destru&iacute;do</strong>.</p>', 1),
(43, NULL, '<p>We <strong>rowed </strong>and he<strong> stormed out</strong>, <strong>slamming </strong>the door so hard the frame <strong>shook</strong>.&nbsp;</p>', NULL, 1, 10, '2020-07-21 14:55:48', '<p>N&oacute;s <strong>remamos </strong>e ele <strong>saiu</strong>, <strong>batendo </strong>a porta t&atilde;o forte que a moldura <strong>tremeu</strong>.</p>', 1),
(44, NULL, '<p>I <strong>lean </strong>against the sink, <strong>sipping </strong>a black coffee to try and revitalise myself</p>', NULL, 1, 10, '2020-07-21 15:08:41', '<p>Eu me inclino sobre a pia, bebendo um caf&eacute; preto para tentar me revitalizar&nbsp;</p>', 1),
(45, NULL, '<p>personally I think she&rsquo;s too <strong>fussy</strong></p>', NULL, 1, 10, '2020-07-21 15:10:10', '<p>Pessoalmente eu acho que ela &eacute; muito <strong>exigente</strong></p>', 1),
(46, NULL, '<p>I&rsquo;m <strong>grumpy </strong>and <strong>on edge </strong>as I slide into the passenger seat.&nbsp;</p>', NULL, 1, 10, '2020-07-21 15:15:06', '<p>Eu estou mal humorado e nervoso quando deslizo para o banco do passageiro</p>', 1),
(47, NULL, '<p>She seems surprisingly <strong>chirpy </strong>this morning.</p>', NULL, 1, 10, '2020-07-21 15:28:53', '<p>Ela parece surpreendentemente alegre essa manh&atilde;</p>', 1),
(48, NULL, '<p>I <strong>nod</strong>, unable to speak</p>', NULL, 1, 10, '2020-07-22 12:19:22', '<p>Eu <strong>aceno</strong>, incapaz de falar.</p>', 1),
(49, NULL, '<p>Andrew isn&rsquo;t <strong>quibbling ove</strong>r letting her have the time off,</p>', NULL, 1, 10, '2020-07-22 12:35:41', '<p>Andrew n&atilde;o est&aacute; brigando por deix&aacute;-la ter uma folga</p>', 1),
(50, NULL, '<p>Lucinda <strong>shifts </strong>over to me, cupping her coffee mug between her fine boned hands. Her lips <strong>twitch</strong>.</p>', NULL, 1, 10, '2020-07-22 14:11:44', '<p>Lucinda <strong>se vira </strong>para mim, colocando sua caneca de caf&eacute; entre as m&atilde;os desossadas. Os l&aacute;bios dela se <strong>contraem</strong>.</p>', 1),
(51, NULL, '<p>i''m <strong>over it</strong></p>', NULL, 1, 10, '2020-07-22 14:15:00', '<p>eu superei</p>', 1),
(52, NULL, '<p>He&rsquo;s so <strong>lanky </strong>he <strong>towers </strong>over us both.&nbsp;</p>', NULL, 1, 10, '2020-07-22 14:15:56', '<p>Ele &eacute; t&atilde;o magro qeu se eleva sobre n&oacute;s dois</p>', 1),
(53, NULL, '<p>My first feeling is one of <strong>relief</strong>, quickly replaced by <strong>dread</strong>.</p>\r\n<p>&nbsp;</p>', NULL, 1, 10, '2020-07-22 14:43:34', '<p>Meu primeiro sentimento &eacute; de <strong>al&iacute;vio</strong>, rapidamente substitu&iacute;do por <strong>pavor</strong>.</p>\r\n<p>&nbsp;</p>', 1),
(54, NULL, '<p>Extensive <strong>stab </strong>wounds to the chest.</p>', NULL, 1, 10, '2020-07-22 14:57:35', '<p>Extensas facadas no peito.</p>', 1),
(55, NULL, '<p>Yasmin <strong>grips </strong>my <strong>wrist </strong>and I turn to her. She looks like she&rsquo;s about to <strong>faint</strong>.</p>', NULL, 1, 10, '2020-07-22 15:00:47', '<p>Yasmin <strong>agarra </strong>meu <strong>pulso </strong>e eu me viro para ela. Parece que ela est&aacute; prestes a <strong>desmaiar</strong>.</p>', 1),
(56, 'Turn off the stove Marvin is a', '<p style="text-align: center;"><span style="font-size: 12pt;"><strong><span style="color: #222222; font-family: Consolas, ''Lucida Console'', ''Courier New'', monospace; white-space: pre-wrap; background-color: #ffffff;">Turn off the stove</span></strong><span style="color: #222222; font-family: Consolas, ''Lucida Console'', ''Courier New'', monospace; text-align: left; white-space: pre-wrap; background-color: #ffffff;"> Marvin is a diligent policeman. He loves his job and carries out his duties. It is summertime, and his team is starting a fire prevention program. Marvin is tasked to promote ways to avoid fire incidents. He reminds residents to always unplug appliances. He tells children not to play with matches. He talks to parents about turning off stoves and heaters when not in use. He gives safety tips to anyone who asks. Marvin is doing a great job. One morning, there is an emergency meeting. Quite alarmed, Marvin leaves his unfilled coffee cup and quickly goes to work. After work, Marvin arrives to find his house on fire. Stunned and confused, Marvin asks the fireman about what happened. The fireman replies, &ldquo;It&rsquo;s because the homeowner forgot to turn off the stove.&rdquo;</span></span><span style="color: #222222; font-family: Consolas, ''Lucida Console'', ''Courier New'', monospace; font-size: 12px; white-space: pre-wrap; background-color: #ffffff;"><br /></span></p>', NULL, 6, 1, '2020-07-23 07:58:47', '<p style="text-align: center;"><strong><span style="color: #222222; font-family: Consolas, ''Lucida Console'', ''Courier New'', monospace; font-size: 12pt; white-space: pre-wrap; background-color: #ffffff;">Desligue o fog&atilde;o</span></strong><span style="color: #222222; font-family: Consolas, ''Lucida Console'', ''Courier New'', monospace; font-size: 10pt; text-align: left; white-space: pre-wrap; background-color: #ffffff;"> Marvin &eacute; um policial aplicado. Ele ama seu trabalho e cumpre seus deveres. &Eacute; ver&atilde;o, e sua equipe est&aacute; come&ccedil;ando um programa de preven&ccedil;&atilde;o de inc&ecirc;ndio. Marvin &eacute; encarregado de promover maneiras de evitar incidentes de inc&ecirc;ndio. Ele lembra os moradores de sempre desligar os aparelhos. Ele diz para as crian&ccedil;as n&atilde;o brincarem com f&oacute;sforos. Ele fala com os pais sobre desligar fog&otilde;es e aquecedores quando n&atilde;o estiver em uso. Ele d&aacute; dicas de seguran&ccedil;a para quem pede. Marvin est&aacute; fazendo um &oacute;timo trabalho. Uma manh&atilde;, h&aacute; uma reuni&atilde;o de emerg&ecirc;ncia. Bastante assustado, Marvin deixa sua x&iacute;cara de caf&eacute; vazia e rapidamente vai para o trabalho. Depois do trabalho, Marvin chega para encontrar sua casa em chamas. Atordoado e confuso, Marvin pergunta ao bombeiro sobre o que aconteceu. O bombeiro responde: &ldquo;&Eacute; porque o dono da casa esqueceu de desligar o fog&atilde;o.</span><strong><span style="color: #222222; font-family: Consolas, ''Lucida Console'', ''Courier New'', monospace; font-size: 12pt; white-space: pre-wrap; background-color: #ffffff;"><br /></span></strong></p>', 1),
(57, NULL, '<p>a tissue <strong>balled up</strong> in her <strong>lap</strong>.</p>', NULL, 1, 10, '2020-07-28 08:06:20', '<p>um len&ccedil;o de papel <strong>enrolado</strong> em seu <strong>colo</strong>.</p>', 1),
(58, NULL, '<p>He <strong>inhales </strong>sharply</p>', NULL, 1, 10, '2020-07-28 08:51:40', '<p>Ele <strong>inspira </strong>profundamente.</p>', 1),
(59, NULL, '<p>They&rsquo;re <strong>falsehoods</strong>, <strong>misleadings</strong>... mythology.&nbsp;</p>', NULL, 1, 10, '2020-07-29 16:42:27', '<p>Eles s&atilde;o falsidades, engana&ccedil;&otilde;es... mitologia.</p>', 1),
(60, NULL, '<p>Day-to-day life</p>', NULL, 1, 10, '2020-07-29 16:47:37', '<p>Vida cotidiana</p>', 1),
(61, NULL, '<p>Jess and I are discussing the <strong>dreaded </strong>&ldquo;get to know you&rdquo;&nbsp;</p>', NULL, 1, 10, '2020-07-29 16:58:41', '<p>Jesse e eu estamos discutindo o temido ''te conhecer''</p>', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `forum_tipos`
--

CREATE TABLE IF NOT EXISTS `forum_tipos` (
  `forum_tipos_id` int(11) NOT NULL,
  `for_tip_nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `forum_tipos`
--

INSERT INTO `forum_tipos` (`forum_tipos_id`, `for_tip_nome`) VALUES
(1, 'Cards'),
(2, 'Expressions'),
(3, ' Phrasal verbs'),
(4, 'Podcasts'),
(5, 'Youtube'),
(6, 'Text'),
(7, 'Tips');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarios_id` int(11) NOT NULL,
  `usu_nome` varchar(45) DEFAULT NULL,
  `usu_senha` varchar(45) DEFAULT NULL,
  `usu_email` varchar(30) DEFAULT NULL,
  `usu_confirmacao_email` int(11) DEFAULT '0',
  `usu_token` varchar(45) DEFAULT NULL,
  `usu_avatar` varchar(35) DEFAULT NULL,
  `usu_genero` varchar(20) DEFAULT NULL,
  `usu_data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `usu_data_alteracao` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `usu_nome`, `usu_senha`, `usu_email`, `usu_confirmacao_email`, `usu_token`, `usu_avatar`, `usu_genero`, `usu_data_cadastro`, `usu_data_alteracao`) VALUES
(1, 'Pablo Machado', 'd8b7d5d4b1f644470a57c1592580cd7a', 'pablomlima75@gmail.com', 0, 'bfd233a7ac93dfa247e06227a9e953d9', '202006pp.jpg', 'masculine', '2020-06-11 09:09:46', '2020-06-29'),
(9, 'pablo machado', 'e10adc3949ba59abbe56e057f20f883e', 'pablo.techzones@gmail.com', 0, '92f1097231a44e59a2aed03a1738545b', 'masculine.png', 'masculine', '2020-07-13 10:01:26', NULL),
(10, 'Tarcísio Machado', 'c631eb873b095c9866f74eac982f2ecf', 'tsysmidtt@gmail.com', 0, '62117e49b3c2c150c5ee9ced51b67901', 'masculine.png', 'masculine', '2020-07-13 11:10:42', NULL),
(11, 'Josue', '11d7d85552606c6c6e17f33545c49ec4', 'josue2011piloes@gmail.com', 0, 'd486b69c4601be7113ee475afed4ad38', 'masculine.png', 'masculine', '2020-07-13 12:03:58', NULL),
(12, 'Matheus', '1fc7dd7a5de170ee00b5d2df26b490a1', 'theu_mendes@hotmail.com', 0, 'fcd9294616fa5fea153c908120ebecdc', 'masculine.png', 'masculine', '2020-07-18 18:31:04', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_forum_favoritos`
--

CREATE TABLE IF NOT EXISTS `usuarios_forum_favoritos` (
  `usuarios_forum_favoritos_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `forum_conteudos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `validacao_robo_text`
--

CREATE TABLE IF NOT EXISTS `validacao_robo_text` (
  `validacao_robo_text_id` int(11) NOT NULL,
  `val_rob_tex_frase` varchar(60) NOT NULL,
  `validacao_robo_traducao_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `validacao_robo_text`
--

INSERT INTO `validacao_robo_text` (`validacao_robo_text_id`, `val_rob_tex_frase`, `validacao_robo_traducao_id`) VALUES
(1, ' How is it going?', 1),
(2, ' Long time no see! ', 2),
(3, 'What have you been up to?', 3),
(4, 'What’s up? ', 4),
(5, 'Are you with me? ', 5),
(6, 'Can’t complain', 6),
(7, 'That’s a good one', 7),
(8, 'It’s very kind of you! ', 8),
(9, 'Thank you anyway', 9),
(10, 'Thank you in advance!', 10),
(11, 'No worries', 11),
(12, 'What’s going on? ', 12),
(13, 'Did I get you right?', 13),
(14, 'Don’t take it to heart', 14),
(15, 'I didn’t catch that', 15),
(16, 'Oh, that explains it ', 16),
(17, 'Things happens', 17),
(18, ' Sorry to bother you', 18),
(19, 'I’ll be with you in a minute', 19),
(20, 'Where were we?', 20),
(21, ' I freaked out ', 21),
(22, 'Good for you! ', 22),
(23, 'You’ve got to be kidding me! ', 23),
(24, 'Come on, you can do it! ', 24),
(25, ' Keep up the good work!', 25),
(26, 'It’s not the end of the world', 26),
(27, 'Not a bit!', 27),
(28, 'There is no room for doubt', 28),
(29, 'It’s not worth it! ', 29),
(30, 'You rock! ', 30),
(31, 'You are a star!', 31),
(32, 'Pull yourself together', 32),
(33, 'You sold me!', 33),
(34, 'Couldn’t care less ', 34),
(35, 'This is a no-brainer ', 35),
(36, 'You screwed up', 36),
(37, 'You are driving me nuts! ', 37),
(38, 'Take care! ', 38);

-- --------------------------------------------------------

--
-- Estrutura da tabela `validacao_robo_traducao`
--

CREATE TABLE IF NOT EXISTS `validacao_robo_traducao` (
  `validacao_robo_traducao_id` int(11) NOT NULL,
  `val_rob_tra_mensagem` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `validacao_robo_traducao`
--

INSERT INTO `validacao_robo_traducao` (`validacao_robo_traducao_id`, `val_rob_tra_mensagem`) VALUES
(1, ' como vai?'),
(2, 'há quanto tempo!'),
(3, 'O que anda fazendo?'),
(4, 'O que está acontecendo?'),
(5, ' está entendendo o que digo?'),
(6, 'não posso me queixar. '),
(7, ' essa é uma boa piada'),
(8, 'que amável da sua parte'),
(9, 'obrigado assim mesmo '),
(10, ' obrigado desde já '),
(11, 'não há com o que se preocupar, tranquilo.'),
(12, 'o que está acontecendo? '),
(13, ' entendi isso direito?'),
(14, 'não leve para o lado pessoal.'),
(15, ' não entendi.'),
(16, 'isso explica tudo.'),
(17, 'coisas acontece'),
(18, 'desculpa te incomodar.'),
(19, 'só um minuto por favor.'),
(20, 'onde estávamos?'),
(21, 'eu perdi o controle.'),
(22, ' fico feliz por você.'),
(23, 'você está brincando, né?'),
(24, ' vai lá, você consegue!'),
(25, 'continue sempre assim! '),
(26, 'não é o fim do mundo.'),
(27, 'nenhum interesse.'),
(28, 'não há espaço para dúvidas.'),
(29, ' não vale a pena.'),
(30, 'você é demais!'),
(31, 'você é incrível'),
(32, ' controle-se, acalme-se.'),
(33, 'você me convenceu.'),
(34, 'não me importa nem um pouco.'),
(35, 'esta é uma decisão muito fácil.'),
(36, ' você estragou tudo.'),
(37, 'você está me enlouquecendo.'),
(38, 'se cuide!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`cards_id`),
  ADD KEY `fk_usuarios_id` (`usuarios_id`);

--
-- Indexes for table `cards_categorias`
--
ALTER TABLE `cards_categorias`
  ADD PRIMARY KEY (`cards_categorias_id`);

--
-- Indexes for table `forum_conteudos`
--
ALTER TABLE `forum_conteudos`
  ADD PRIMARY KEY (`forum_conteudos_id`),
  ADD KEY `fk_forum_conteudos_forum_tipos_idx` (`forum_tipos_id`),
  ADD KEY `fk_forum_conteudos_usuarios1_idx` (`usuarios_id`);

--
-- Indexes for table `forum_tipos`
--
ALTER TABLE `forum_tipos`
  ADD PRIMARY KEY (`forum_tipos_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_id`);

--
-- Indexes for table `usuarios_forum_favoritos`
--
ALTER TABLE `usuarios_forum_favoritos`
  ADD PRIMARY KEY (`usuarios_forum_favoritos_id`),
  ADD KEY `fk_favoritos_usuarios_id` (`usuarios_id`),
  ADD KEY `fk_favoritos_forum_conteudos_id` (`forum_conteudos_id`);

--
-- Indexes for table `validacao_robo_text`
--
ALTER TABLE `validacao_robo_text`
  ADD PRIMARY KEY (`validacao_robo_text_id`),
  ADD KEY `fk_validacao_robo_translate_id` (`validacao_robo_traducao_id`);

--
-- Indexes for table `validacao_robo_traducao`
--
ALTER TABLE `validacao_robo_traducao`
  ADD PRIMARY KEY (`validacao_robo_traducao_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `cards_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `cards_categorias`
--
ALTER TABLE `cards_categorias`
  MODIFY `cards_categorias_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_conteudos`
--
ALTER TABLE `forum_conteudos`
  MODIFY `forum_conteudos_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `forum_tipos`
--
ALTER TABLE `forum_tipos`
  MODIFY `forum_tipos_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usuarios_forum_favoritos`
--
ALTER TABLE `usuarios_forum_favoritos`
  MODIFY `usuarios_forum_favoritos_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `validacao_robo_text`
--
ALTER TABLE `validacao_robo_text`
  MODIFY `validacao_robo_text_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `validacao_robo_traducao`
--
ALTER TABLE `validacao_robo_traducao`
  MODIFY `validacao_robo_traducao_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `fk_usuarios_id` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`usuarios_id`);

--
-- Limitadores para a tabela `forum_conteudos`
--
ALTER TABLE `forum_conteudos`
  ADD CONSTRAINT `fk_forum_conteudos_forum_tipos` FOREIGN KEY (`forum_tipos_id`) REFERENCES `forum_tipos` (`forum_tipos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_forum_conteudos_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`usuarios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios_forum_favoritos`
--
ALTER TABLE `usuarios_forum_favoritos`
  ADD CONSTRAINT `fk_favoritos_forum_conteudos_id` FOREIGN KEY (`forum_conteudos_id`) REFERENCES `forum_conteudos` (`forum_conteudos_id`),
  ADD CONSTRAINT `fk_favoritos_usuarios_id` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`usuarios_id`);

--
-- Limitadores para a tabela `validacao_robo_text`
--
ALTER TABLE `validacao_robo_text`
  ADD CONSTRAINT `fk_validacao_robo_translate_id` FOREIGN KEY (`validacao_robo_traducao_id`) REFERENCES `validacao_robo_traducao` (`validacao_robo_traducao_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
