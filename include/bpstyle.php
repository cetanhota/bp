<style>
/* ----------- Body & Layout ----------- */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    background-color: #f0f4f8;
    background-attachment: fixed;
    margin: 0;
    padding: 0;
}

/* Centered container for forms and tables */
.container {
    width: 95%;
    max-width: 1000px;
    margin: 20px auto;
    padding: 20px;
}

/* ----------- Headings ----------- */
h1, h2, h3 {
    color: #AD4029;
    text-align: center;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    margin-bottom: 20px;
}

/* ----------- Buttons ----------- */
.f_button {
    background-color: #AD4029;
    border: none;
    color: #fff;
    padding: 10px 30px;
    font-size: 16px;
    margin: 10px 0;
    cursor: pointer;
    border-radius: 25px;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.5);
    transition: all 0.3s ease;
}

.f_button:hover {
    background-color: #ff7b5c;
    color: #000;
    transform: translateY(-2px);
}

/* ----------- Forms ----------- */
form p {
    margin: 10px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

form label {
    font-weight: bold;
    width: 180px;
}

form input, form select {
    padding: 8px 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    flex: 1;
}

/* ----------- Tables ----------- */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    background-color: #fff;
}

th, td {
    padding: 12px 15px;
    text-align: center;
}

th {
    background-color: #AD4029;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* BP Color-coding classes */
.bp-normal { background-color: #c6f6c6; }      /* green */
.bp-elevated { background-color: #fff8b0; }    /* yellow */
.bp-stage1 { background-color: #ffd699; }      /* orange */
.bp-stage2 { background-color: #ff9999; }      /* red */
.bp-crisis { background-color: #c299ff; color: #000; } /* purple */

/* ----------- Graph Cards ----------- */
.graphshadow {
    width: 100%;
    max-width: 900px;
    margin: 20px auto;
    padding: 15px;
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    background-color: #fff;
    text-align: center;
}

/* ----------- Misc ----------- */
select:invalid {
    color: #999;
}

hr {
    height: 2px;
    background-color: #AD4029;
    border: none;
    margin: 20px 0;
}
</style>

