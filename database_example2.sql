
INSERT INTO `User` (`U_ID`, `Screen_Name`, `Join_Date`, `Password`) VALUES
(null, 'QuietOne', '2012-06-10', '4b939e3aa91af9ceee4b64ab52ea517c0435254d69b2a32f1189a5b9a8a83ba5'),
(null, 'superuser', '2012-06-10', '13bafb0477b43a3114beee855e1eb7a7d491c61c4008545348d7d37ebe89f88e'),
(null, 'fortnerm', '2012-06-10', '661a1dc33a89ab8d1dfd7baceaa2fc9d69c0a800d824bb08905514b9d1565cd2'),
(null, 'noob451', '2012-06-10', '2d570199b3ec827ae7db4e058c4267562cd790d3422f504bec4bd0fea164932b'),
(null, 'robocroc4000', '2012-06-10', '9fb6e14bec53741073479d8f211528dfad69adbd36e889499619671339ba887b');

INSERT INTO `Thread` (`T_ID`, `U_ID`, `Creation_Time`, `Title`) VALUES
(null, 3, '2012-06-10 17:41:24', 'First post!'),
(null, 1, '2012-06-10 17:44:11', 'Best Thread'),
(null, 1, '2012-06-10 17:44:47', 'Useless Thread'),
(null, 1, '2012-06-10 17:45:18', 'Full Thread'),
(null, 4, '2012-06-10 21:42:06', 'Forum Policy Question'),
(null, 5, '2012-06-10 21:44:39', 'C question');

INSERT INTO `Post` (`P_Number`, `T_ID`, `U_ID`, `Post_Time`, `Last_Edit_Time`, `Content`) VALUES
(null, 1, 3, '2012-06-10 17:41:24', '2012-06-10 17:41:24', 'first pwnst, lol'),
(null, 1, 1, '2012-06-10 17:43:47', '2012-06-10 17:43:47', 'My first post is better, though.'),
(null, 2, 1, '2012-06-10 17:44:11', '2012-06-10 17:44:11', 'It just is.  No way around it.'),
(null, 4, 1, '2012-06-10 17:44:47', '2012-06-10 17:44:47', 'I need a lot of filler for testing.'),
(null, 4, 1, '2012-06-10 17:45:18', '2012-06-10 17:45:18', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:45:20', '2012-06-10 17:45:20', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:45:22', '2012-06-10 17:45:22', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:45:23', '2012-06-10 17:45:23', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:45:26', '2012-06-10 17:45:26', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:45:29', '2012-06-10 17:45:29', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:45:31', '2012-06-10 17:45:31', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:45:33', '2012-06-10 17:45:33', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:45:35', '2012-06-10 17:45:35', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:45:38', '2012-06-10 17:45:38', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:46:50', '2012-06-10 17:46:50', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:46:53', '2012-06-10 17:46:53', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:46:58', '2012-06-10 17:46:58', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:47:01', '2012-06-10 17:47:01', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:47:03', '2012-06-10 17:47:03', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:47:05', '2012-06-10 17:47:05', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:47:08', '2012-06-10 17:47:08', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:47:10', '2012-06-10 17:47:10', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:47:12', '2012-06-10 17:47:12', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:47:17', '2012-06-10 17:47:17', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:47:20', '2012-06-10 17:47:20', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:49:06', '2012-06-10 17:49:06', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 1, '2012-06-10 17:49:09', '2012-06-10 17:49:09', '01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789'),
(null, 4, 3, '2012-06-10 17:52:45', '2012-06-10 17:52:50', 'It''s called Lorem Ipsum, son. Use it!'),
(null, 3, 1, '2012-06-10 17:56:56', '2012-06-10 17:56:56', 'asdf'),
(null, 3, 1, '2012-06-10 17:57:07', '2012-06-10 17:57:07', 'bold?'),
(null, 3, 1, '2012-06-10 18:01:59', '2012-06-10 18:01:59', 'bold!'),
(null, 3, 1, '2012-06-10 18:02:37', '2012-06-10 18:02:37', 'fricking <b>Bold</b>!'),
(null, 3, 1, '2012-06-10 18:02:45', '2012-06-10 18:02:45', 'lol'),
(null, 3, 1, '2012-06-10 18:03:02', '2012-06-10 18:03:02', 'huh'),
(null, 3, 1, '2012-06-10 18:03:10', '2012-06-10 18:03:10', 'wtvr'),
(null, 3, 1, '2012-06-10 18:03:41', '2012-06-10 18:03:41', ' no bold, then '),
(null, 5, 4, '2012-06-10 21:42:06', '2012-06-10 21:42:06', 'Are we allowed to post links to obviously seedy 3rd party sites?'),
(null, 6, 5, '2012-06-10 21:44:39', '2012-06-10 21:44:39', 'how many pointers can fit in my hard drive?'),
(null, 6, 1, '2012-06-10 21:46:50', '2012-06-10 21:46:50', 'That question doesn''t even make sense.'),
(null, 2, 1, '2012-06-10 21:47:45', '2012-06-10 21:47:45', 'This thread is still the best!');