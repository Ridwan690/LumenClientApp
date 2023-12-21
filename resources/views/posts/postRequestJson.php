<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Post</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>List Post</h1>
        <?php if (!empty($result['data'])): ?>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td><?php echo isset($result['data'][0]['id']) ? $result['data'][0]['id'] : 'Tidak Tersedia'; ?></td>
                    </tr>
                    <tr>
                        <td>User ID</td>
                        <td><?php echo isset($result['data'][0]['user_id']) ? $result['data'][0]['user_id'] : 'Tidak Tersedia'; ?></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td><?php echo isset($result['data'][0]['title']) ? $result['data'][0]['title'] : 'Tidak Tersedia'; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?php echo isset($result['data'][0]['status']) ? $result['data'][0]['status'] : 'Tidak Tersedia'; ?></td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td><?php echo isset($result['data'][0]['content']) ? $result['data'][0]['content'] : 'Tidak Tersedia'; ?></td>
                    </tr>
                    <tr>
                        <td>Created at</td>
                        <td><?php echo isset($result['data'][0]['created_at']) ? $result['data'][0]['created_at'] : 'Tidak Tersedia'; ?></td>
                    </tr>
                    <tr>
                        <td>Updated at</td>
                        <td><?php echo isset($result['data'][0]['updated_at']) ? $result['data'][0]['updated_at'] : 'Tidak Tersedia'; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p>Data tidak tersedia.</p>
        <?php endif; ?>
    </div>
</body>
</html>
