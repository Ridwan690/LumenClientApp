<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>List Post</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <td>ID</td>
                    <td><?php echo $results['id'] ?></td>
                </tr>
                <tr>
                    <td>User ID</td>
                    <td><?php echo $results['user_id'] ?></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><?php echo $results['title'] ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $results['status'] ?></td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td><?php echo $results['content'] ?></td>
                </tr>
                <tr>
                    <td>Created at</td>
                    <td><?php echo $results['created_at'] ?></td>
                </tr>
                <tr>
                    <td>Updated at</td>
                    <td><?php echo $results['updated_at'] ?></td>
                </tr>
            </thead>
        </table>

        <a href="/posts/get-request-xml" class="btn btn-primary mb-3">Back</a>
    </div>
</body>
</html>