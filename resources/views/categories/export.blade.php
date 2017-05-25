<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600">
    <style>
        body {
            width: 8.27in;
            margin: auto;
            padding: 0.25in;

            font-family: "Raleway", sans-serif;
            font-size: 11pt;

            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            margin: 0 !important;
        }

        table {
            width: 100%;
            table-layout: fixed;
            text-align: left;
            border-collapse: collapse;
            page-break-inside:avoid;
        }

        caption, td {
            padding: 0.08in 0.1in 0.06in;
            height: 0.25in;
            border: 1px solid #2e2e2e;
        }

        caption {
            text-align: left;
            background: #d0cece;
            font-weight: bold;
            border-bottom: none;
            margin-right: -1px;
        }

        td.label {
            width: 1.6in;
            font-weight: bold;
        }
        td.label.label-xs {
            width: 0.4in;
        }
        td.label.label-sm {
            width: 1.4in;
        }
        td.label.label-md {
            width: 1.8in;
        }
        td.label.label-lg {
            width: 2in;
        }

        td.label.label-em {
            background-color: #ddd;
        }

        .no-top-border, .no-top-border  > td {
            border-top-width: 0;
        }
        .no-bottom-border, .no-bottom-border > td {
            border-bottom-width: 0;
        }

        table:last-of-type, table:last-of-type tr:last-child,
        table:last-of-type tr:last-child > td {
            border-bottom-width: 1px !important;
        }

        .page-title {
            width: 100%;
            text-align: center;
        }

        .profile-image {
            height: 2.2in;
            width: 2in;
            float: right;
            border: 1px solid #2e2e2e;
            margin-left: 0.1in;
            margin-top: 0.25in;
            margin-bottom: 0.1in;
        }
    </style>
</head>
<body>





<h1 class="page-title" style="padding-left: 1.15in;">Employee Information</h1>


<table style="width: 6.02in;">
    <a href="{{ route('invoices.show', [$category->id, 'download' => 'pdf']) }}">Download PDF</a>
    <caption>General Information</caption>
    <tbody>
    <tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr><tr>
        <td class="label label-md">Category Name</td>
        <td>{{ $category->name }}</td>
    </tr>
    <tr class="no-bottom-border">
        <td class="label label-md">Category Description</td>
        <td>{{ $category->description }}</td>
    </tr>
    </tbody>
</table>




























</body>
</html>
