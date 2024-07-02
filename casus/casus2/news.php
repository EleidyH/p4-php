
 
<?php
require 'db.php';
 
// Functies om met de database te werken
 
function getNews() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM news");
    $stmt->execute();
    $result = $stmt->get_result();
    $news = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $news;
}
 
function getNewsByCategory($category_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM news WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $news = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $news;
}
 
function getNewsById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $news = $result->fetch_assoc();
    $stmt->close();
    return $news;
}
 
function addNews($category_id, $title, $content) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO news (category_id, title, content, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iss", $category_id, $title, $content);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
 
function editNews($id, $title, $content) {
    global $conn;
    $stmt = $conn->prepare("UPDATE news SET title = ?, content = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $content, $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
 
function deleteNews($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
 
function getCategories() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM categories");
    $stmt->execute();
    $result = $stmt->get_result();
    $categories = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $categories;
}
 
function addComment($news_id, $name, $email, $content) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO comments (news_id, name, email, content, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("isss", $news_id, $name, $email, $content);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
 
function trackViews($news_id) {
    global $conn;
    $stmt = $conn->prepare("UPDATE news SET views = views + 1 WHERE id = ?");
    $stmt->bind_param("i", $news_id);
    $stmt->execute();
    $stmt->close();
}
 
function getCommentsByNewsId($news_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM comments WHERE news_id = ? ORDER BY created_at DESC");
    $stmt->bind_param("i", $news_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $comments = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $comments;
}
?>