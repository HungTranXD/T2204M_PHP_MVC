<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section>
        <div class="container">
            <h1 class="text-center">All student</h1>
            <div class="row justify-content-center">
                <div class="col-7">
                    <a type="button" class="btn btn-primary" href="?module=student&action=create">Create student</a>
                    <form action="searchstudent.php" method="post" class="row justify-content-between gx-0 mt-3">
                        <div class="col-auto">
                            <label for="inputNameOrEmail" class="visually-hidden">Name / Email</label>
                            <input type="text" name="name/email" class="form-control" id="inputNameOrEmail" placeholder="Name / Email">
                        </div>
                        <div class="col-auto">
                            <label for="selectGender" class="visually-hidden">Gender</label>
                            <select class="form-select" name="gender" aria-label="Default select example" id="selectGender">
                                <option value="">All gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="inputLowMark" class="visually-hidden">Low mark</label>
                            <input type="number" step="0.1" name="lowMark" class="form-control" id="inputLowMark" placeholder="Mark from...">
                        </div>
                        <div class="col-auto pt-1">></div>
                        <div class="col-2">
                            <label for="inputHighMark" class="visually-hidden">High mark</label>
                            <input type="number" step="0.1" name="highMark" class="form-control" id="inputHighMark" placeholder="to...">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </div>
                    </form>
                    <table class="table table-striped table-border">
                        <thead>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>mark</th>
                            <th>gender</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item) : ?>
                                <tr>
                                    <td><?php echo $item->id ?></td>
                                    <td><?php echo $item->name ?></td>
                                    <td><?php echo $item->email ?></td>
                                    <td><?php echo $item->mark ?></td>
                                    <td><?php echo $item->gender ?></td>
                                    <td>
                                        <a type="button" class="btn btn-success btn-sm" href="?module=student&action=edit&id=<?php echo $item->id ?>">Edit</a>
                                        <!-- Cach 1 -->
                                        <a onclick="return confirm('Are you sure you want to delete student with ID = <?php echo $item->id ?>')" type="button" class="btn btn-danger btn-sm" href="deletestudent.php?id=<?php echo $item->id ?>">Delete</a>
                                        <!-- Cach 2 (an toan hơn) -->
                                        <form action="?module=student&action=delete" method="post">
                                            <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
