# php_learning

-----------------------------------------------------------
About the Project
This repository showcases the bug fixes and learning journey during the development of a University Management Dashboard project. The project is designed for an American university and provides a fully functional portal to manage student enrollment, faculty roles, and various administrative tasks.

Key Features of the University Management Dashboard:
Student Enrollment: Allows students to enroll by filling out an online form and assigns batches based on their program registration.
Faculty Management: Enables admins to directly handle faculty roles and responsibilities.
Course and Program Management: Includes categories for courses, programs, and room assignments for classes.
Grading and Attendance: Tracks student grades and attendance efficiently.

-------------------------------------------------------------------------


Day 1: Learning and Bug Fixes

Issue:
The data displayed in the dashboard was incorrect and inconsistent. The issue arose from the code fetching data from the wrong database table, leading to mismatches and inaccuracies. Additionally, the code's performance was slow.

Solution:

    Analysis:
        Analyzed the database schema to identify the correct columns and tables for the required data.
        Compared the fetched data with the database to pinpoint discrepancies.

    Bug Fix:
        Updated the code to retrieve data from the correct table.
        Used the pluck method in Laravel to fetch specific columns, improving query efficiency and performance.
        Used the join method to take data from both the table.
        

    Outcome:
        The bug was resolved, and the dashboard now displays accurate data.
        The performance of the system improved significantly.


Why This Repository?
This repository reflects my journey of learning and problem-solving in PHP and Laravel. It demonstrates my ability to:

Analyze and debug complex systems.
Optimize code for better performance.
Work on real-world projects and deliver functional solutions.
This project is an excellent example of my dedication to continuous learning and improving my skills as a developer.

