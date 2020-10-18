<!DOCTYPE html>
<html lang="en">
<head>
    <title>VueClient</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon.png">
    <script src="./js/config.js"></script>
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>

<body>
<header class="container-fluid pt-4 text-center">
    <h2 id="message">Welcome to the <span class="highlight">VueClient</span> Client<br/> @{{display}}</h2>
</header>

<main>

    <div class="mx-auto card my-4" style="width: 75%">
        <div class="mx-auto card-body">
            <h5 class="card-title text-center">Departments</h5>
            <section id="departments">
                    <table class="table table-striped">
                        <caption class="text-center">
                            The Departments
                        </caption>

                        <colgroup>
                            <col/>
                            <col/>
                            <col/>
                            <col/>
                        </colgroup>

                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Dept_No</th>
                            <th scope="col">Dept_Name</th>
                            <th scope="col">First_Name</th>
                            <th scope="col">Last_Name</th>
                        </tr>
                        </thead>

                                @foreach($depts as $d)
                            <tr>
                                    <td>{{$d->dept_no}}</td>
                                    <td>{{$d->dept_name}}</td>
                                    <td>{{$d->first_name}}</td>
                                    <td>{{$d->last_name}}</td>
                            </tr>
                                @endforeach
                    </table>
            </section>
        </div>
    </div>

    <div class="mx-auto card my-4" style="width:75%">
        <div class="text-center card-body">
            <h5 class="card-title">Search Employees</h5>

            <section id="employees">
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2 my-4 mx-auto">
                            <button v-on:click.prevent="getEmployees" class="btn btn-lg btn-outline-primary">Fetch
                                Employee Data
                            </button>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <label for="gender" class="col-4 col-form-label">Gender:</label>
                        <div class="col-4">
                            <select v-model="gender" class="form-control" id="gender">
                                <option disabled value="">Please select a valid option</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <label for="hireDate" class="col-4 col-form-label">Hire Date:</label>
                        <div class="col-4">
                            <input v-model="hireDate" type="date" class="form-control" id="hireDate"/>
                        </div>
                    </div>
                </form>

                <div v-if="failure">
                    <aside class="lowlight">Failed To Fetch Employee Records</aside>
                </div>
                <div v-else-if="employees.length">
                    <table class="table table-striped">
                        <caption class="text-center">
                            The Employees
                        </caption>

                        <colgroup>
                            <col/>
                            <col/>
                            <col/>
                            <col/>
                            <col/>
                            <col/>
                        </colgroup>

                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Emp_No</th>
                            <th scope="col">Birth_Date</th>
                            <th scope="col">First_Name</th>
                            <th scope="col">Last_Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Hire_Date</th>
                        </tr>
                        </thead>

                        <tr v-for="employee in employees" :key="employee.emp_no">
                            <td>@{{employee.emp_no}}</td>
                            <td>@{{employee.birth_date}}</td>
                            <td>@{{employee.first_name}}</td>
                            <td>@{{employee.last_name}}</td>
                            <td>@{{employee.gender}}</td>
                            <td>@{{employee.hire_date}}</td>
                        </tr>
                    </table>
                </div>
                <div v-else>
                    <aside>No Employee Data</aside>
                </div>
            </section>
        </div>
    </div>

    <div class="mx-auto card my-4" style="width:75%">
        <div class="mx-auto card-body">
            <h5 class="card-title text-center my-2">Create New Employee</h5>
            <section id="create-employee">
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-10 offset-sm-2 my-4">
                            <button v-on:click.prevent="createEmployee" class="btn btn-lg btn-outline-primary">Create
                                New
                                Employee
                            </button>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <label for="empNo" class="col-4 col-form-label">Emp_No:</label>
                        <div class="col-8">
                            <input v-model="empNo" type="number" class="form-control" id="empNo"/>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <label for="birthDate" class="col-4 col-form-label">Birth Date:</label>
                        <div class="col-8">
                            <input v-model="birthDate" type="date" class="form-control" id="birthDate"/>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <label for="firstName" class="col-4 col-form-label" style="padding-left: 0">First Name:</label>
                        <div class="col-8">
                            <input v-model="firstName" type="text" id="firstName" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <label for="lastName" class="col-4 col-form-label" style="padding-left: 0">Last Name:</label>
                        <div class="col-8">
                            <input v-model="lastName" type="text" id="lastName" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <label for="gender1" class="col-4 col-form-label">Gender:</label>
                        <div class="col-8">
                            <select v-model="gender" id="gender1" class="form-control">
                                <option value="" hidden disabled>Please select a valid option</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <label for="hireDate1" class="col-4 col-form-label" style="padding-left: 0">Hire Date:</label>
                        <div class="col-8">
                            <input v-model="hireDate" type="date" id="hireDate1" class="form-control">
                        </div>
                    </div>
                </form>
                <div v-if="success">
                    <aside class="highlight text-center">Successfully Created New Employee</aside>
                </div>
                <div v-else-if="failure">
                    <aside class="lowlight text-center">Failed To Create New Employee</aside>
                </div>
            </section>
        </div>
    </div>

</main>

<footer class="text-center">
    <address>
        <label>Contact information:</label>
        <label>Toll-free: <a href="tel:+1-888-629-8620" target="_blank">1-888-629-8620</a></label>

        <label><a href="mailto:info@mitechisys.com">info@mitechisys.com</a></label>
    </address>
</footer>

<script src="js/app.js"></script>

</body>

</html>
