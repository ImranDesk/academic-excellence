<!DOCTYPE html>
<html>
<head>
    <title>Add Blog</title>
</head>
<body>
    <h2>Add New Blog Post</h2>
    <form action="save-blog.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Blog Title" required><br><br>

        <input type="text" name="author" placeholder="Author Name"><br><br>

        <input type="file" name="image" accept="image/*" required><br><br>

        <textarea name="content" placeholder="Write your blog content here..." rows="10" cols="50" required></textarea><br><br>

        <button type="submit">Publish Blog</button>
    </form>
</body>
</html>
