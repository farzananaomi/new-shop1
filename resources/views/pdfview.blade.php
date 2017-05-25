<!DOCTYPE html>
<html lang="en">
<head>
    <title>  </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
        }

        table, td, th {
            border: 1px solid black;
            text-align: center;
        }

        table,table2 th {
            height: 30px;
        }

        .page-break {
            page-break-after: always;
        }

    </style>
</head>
<body>

<div>
    <img   style="width: 150px; height: 100px" src="http://www.gazi.com/wp-content/uploads/2014/07/gazi-group1.png"><span style="font-size:30px; margin-top: 10px">Gazi Tyres</span>
    <h1 class="text-right">Employee Information</h1>
    <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>
    <table>
        <tr>
            <th colspan="8" style="background-color: #9d9d9d">GENERAL INFORMATION</th>

        </tr>

        <tr>
            <td colspan="4">Employee Name</td>
            <td colspan="4"></td>
        </tr>

        <tr>
            <td colspan="4">Employee ID</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="4">Employee Card No</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="2">Designation</td>
            <td colspan="2">Officer(Factory)</td>
            <td colspan="2">Department</td>
            <td colspan="2">Factory Stuff</td>
        </tr>
        <tr>
            <td colspan="2">Section</td>
            <td colspan="2"></td>
            <td colspan="2">Zone</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2">Official Number</td>
            <td colspan="2"></td>
            <td colspan="2">Personal Number</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2">Official E-mail</td>
            <td colspan="2"></td>
            <td colspan="2">Personal E-mail</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th colspan="8" style="background-color: #9d9d9d">BASIC INFORMATION</th>
        </tr>
        <tr>
            <td colspan="2">Gender</td>
            <td colspan="1"></td>
            <td colspan="1">Date Of Birth</td>
            <td colspan="1"></td>
            <td colspan="1">Blood Group</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2">Religion</td>
            <td colspan="2"></td>
            <td colspan="2">Nationality</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2">NID</td>
            <td colspan="2"></td>
            <td colspan="2">Marital Status</td>
            <td colspan="2"></td>
        </tr>
    </table>
</div>
<div  style="  width:29%;float:right;">
    <img src="https://static.pexels.com/photos/1848/nature-sunny-red-flowers.jpg" alt="" style="width: 100%;height: 300px;  margin-top: -330px; border:  border: 3px solid #0d3625">
</div>
<table class="table2" style="width:100%">
    <tr>
        <th colspan="8" style="background-color: #9d9d9d">EMERGENCY CONTACT INFORMATION</th>
    </tr>
    <tr>
        <td colspan="2">Name</td>
        <td colspan="2"></td>
        <td colspan="2">Relation</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Phone</td>
        <td colspan="2"></td>
        <td colspan="2">Alternate Phone</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <th colspan="8" style="background-color: #9d9d9d">FAMILY INFORMATION</th>
    </tr>
    <tr>
        <td colspan="2">Father’s Name</td>
        <td colspan="2"></td>
        <td colspan="2">Mother's Name</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Spouse Name</td>
        <td colspan="2"></td>
        <td colspan="2">No of Child</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="1">Name Of 1st Child </td>
        <td colspan="7"></td>
    </tr>
    <tr>
        <th colspan="8" style="background-color: #9d9d9d">PRESENT ADDRESS</th>
    </tr>
    <tr>
        <td colspan="2">House</td>
        <td colspan="2"></td>
        <td colspan="2">Road</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Section</td>
        <td colspan="2"></td>
        <td colspan="2">Post Office</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Police Station</td>
        <td colspan="2"></td>
        <td colspan="2">District</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="1">Postal Code</td>
        <td colspan="7"></td>
    </tr>
    <tr>
        <td colspan="1">Additional Info</td>
        <td colspan="7"></td>
    </tr>

    <tr>
        <th colspan="8" style="background-color: #9d9d9d">PERMANENT ADDRESS</th>
    </tr>
    <tr>
        <td colspan="2">Village</td>
        <td colspan="2"></td>
        <td colspan="2">Post Office</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Police Station</td>
        <td colspan="2"></td>
        <td colspan="2">District</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="1">Postal Code</td>
        <td colspan="7"></td>
    </tr>
    <tr>
        <td colspan="1">Additional Info</td>
        <td colspan="7"></td>
    </tr>
    <div class="page-break"></div>

    <tr>
        <th colspan="8" style="background-color: #9d9d9d">BANK INFORMATION</th>
    </tr>
    <tr>
        <td colspan="2">Bank Name</td>
        <td colspan="2"></td>
        <td colspan="2">Branch</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Account Name</td>
        <td colspan="2"></td>
        <td colspan="2">Account Number</td>
        <td colspan="2"></td>
    </tr>

    <tr>
        <td colspan="1" style="background-color: #9d9d9d">Nominee Name</td>
        <td colspan="7"></td>
    </tr>
    <tr>
        <td colspan="2">Relation</td>
        <td colspan="2"></td>
        <td colspan="2">Contact</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Email</td>
        <td colspan="2"></td>
        <td colspan="2">NID</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <th colspan="8" style="background-color: #9d9d9d">EMPLOYMENT INFORMATION</th>
    </tr>
    <tr>
        <td colspan="2">Date of Joining</td>
        <td colspan="2"></td>
        <td colspan="2">Starting Salary</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Date Of Confirmation</td>
        <td colspan="2"></td>
        <td colspan="2"> Confirmation Salary</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Probation Period </td>
        <td colspan="2"></td>
        <td colspan="2">Current Salary</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Section</td>
        <td colspan="2"></td>
        <td colspan="2">Zone</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="1">Date Of Last Promotion</td>
        <td colspan="7"></td>
    </tr>
    <tr>
        <th colspan="8" style="background-color: #9d9d9d">TEAM INFORMATION</th>
    </tr>
    <tr>
        <td colspan="2">Reporting Person</td>
        <td colspan="2"></td>
        <td colspan="2">Reporting Person's ID</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Manager</td>
        <td colspan="2"></td>
        <td colspan="2"> Manager ID</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Department Head </td>
        <td colspan="2"></td>
        <td colspan="2">Department Head's ID</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Job Location</td>
        <td colspan="2"></td>
        <td colspan="2">Section/Depot</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <th colspan="8" style="background-color: #9d9d9d">ACADEMIC QUALIFICATION-1</th>
    </tr>
    <tr>
        <td colspan="2">Name of degree</td>
        <td colspan="2"></td>
        <td colspan="2">Borad/Institute</td>
        <td colspan="2">Sirajgonj Govt. College, Sirajgonj</td>
    </tr>
    <tr>
        <td colspan="2">Passing Year</td>
        <td colspan="2"></td>
        <td colspan="2">Result</td>
        <td colspan="2"></td>
    </tr>
</table>
</body>
</html>
