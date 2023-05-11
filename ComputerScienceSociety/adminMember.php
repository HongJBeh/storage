<?php 
    include('cssocietyDB.php');
 ?>
<!doctype html>
<html>  
    <head>
        <meta charset="UTF-8">
        <title>Admin | CS Society</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="adminStyles.css" rel="stylesheet">
      </head>

    <body>

      <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 py-3 fs-6" href="adminMain.php">Computer Sciecne Society</a>
        <div class="navbar-nav">
          <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="MainPage.php">Sign out</a>
          </div>
        </div>
      </header>

      <nav class="d-flex flex-nowrap sidebar">
        <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
          <p href="/" class="d-flex align-items-center pb-2 mb-2 link-dark text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">Admin Panel</span>
          </p>
          <ul class="list-unstyled ps-0">
            <li class="mb-1">
              <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                Events
              </button>
              <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="adminAddE.php" class="link-dark d-inline-flex text-decoration-none rounded">Add Event</a></li>
                  <li><a href="adminEditE.php" class="link-dark d-inline-flex text-decoration-none rounded">Event Management</a></li>
                </ul>
              </div>
            </li>
            <li class="mb-1">
              <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                Account Management
              </button>
              <div class="collapse" id="dashboard-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="adminAdm.php" class="link-dark d-inline-flex text-decoration-none rounded">Admin</a></li>
                  <li><a href="adminMember.php" class="link-dark d-inline-flex text-decoration-none rounded">Member</a></li>
                  <li><a href="MainPage.php" class="link-dark d-inline-flex text-decoration-none rounded">Sign Out</a></li>
                </ul>
              </div>
            </li>
            </li>
          </ul>
        </div>
      </nav>
    
      <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Member Management</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
          </div>
        </div>
        <div class="pt-3">
          <table class="table table-striped table-dark table-md">
            <thead>
                <tr class="text-center">
                <h3>Members</h3>
                <th scope="col p-1">No.</th>
                <th scope="col p-1">Student First Name</th>
                <th scope="col p-1">Student Last Name</th>
                <th scope="col p-1">Student ID</th>
                <th scope="col p-1">Password</th>
                <th scope="col p-1">Gender</th>
                <th scope="col p-1">Address</th> 
                <th scope="col p-1">State</th> 
                <th scope="col p-1">Postcode</th> 
                <th scope="col p-1">City</th> 
                <th scope="col p-1">PhoneNo</th> 
                <th scope="col p-1">EmergencyPhNo</th> 
                <th scope="col p-1">Relationship</th>  
                <th scope="col p-1">Action</th>  
              </tr>
            </thead>
            <tbody>
              <?php
                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                $sql = "SELECT * FROM member";
                
                if ($result = $con->query($sql))
                {
                    while ($row = $result->fetch_object())
                    {
                        printf('
                            <tr class="align-middle text-center">
                                <td class="p-1">%s</td>
                                <td class="p-1">%s</td>
                                <td class="p-1">%s</td>
                                <td class="p-1">%s</td>
                                <td class="p-1">%s</td>
                                <td class="p-1 text-middle">%s</td>
                                <td class="p-1">%s</td>
                                <td class="p-1">%s</td>
                                <td class="p-1">%s</td>
                                <td class="p-1">%s</td>
                                <td class="p-1">%s</td>
                                <td class="p-1">%s</td>
                                <td class="p-1">%s</td>
                                <td>
                                <button type="button" class="btn btn-success m-1" name="edit"><a class="text-decoration-none text-white" href="editMemberDB.php?id=%s">Edit</a></button>
                                <button type="button" class="btn btn-danger m-1" name="delete"><a class="text-decoration-none text-white" href="delMemberDB.php?id=%s">Delete</a></button>
                                </td>
                            </tr>', 
                            $row->No, 
                            $row->StudentFirstName,
                            $row->StudentLastName,
                            $row->StudentID,
                            $row->Password,
                            $row->Gender,
                            $row->Address,
                            $row->State,
                            $row->Postcode,
                            $row->City,
                            $row->PhoneNo,
                            $row->EmergencyPhNo,
                            $row->Relationship,
                            $row->No,
                            $row->No);
                }
                
                printf('
                    <tr>
                    <td colspan = "14" class="p-3 text-success">
                        There are %d member record(s).
                    </td>
                    </tr>', $result->num_rows);
                }
                
                $result->free();
                $con->close();
              ?>
          </tbody>
          </table>
      </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
