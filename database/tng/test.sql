SELECT CONCAT(first_name, ' ', last_name) full_name, birth_date
FROM employees;

SELECT dept_name, COUNT(*)
FROM employees emp
	INNER JOIN dept_emp dp_e
	ON emp.emp_no = dp_e.emp_no
	INNER JOIN departments dp
	ON dp_e.dept_no = dp.dept_no
GROUP BY dp.dept_name;

SELECT CONCAT(emp.first_name, ' ', emp.last_name) full_name, sal.salary
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
ORDER BY salary DESC
LIMIT 1;

SELECT DISTINCT title
FROM titles;

SELECT CONCAT(first_name, ' ', last_name) full_name, hire_date
FROM employees 
WHERE YEAR(hire_date) = 1999;

SELECT dp.dept_name, CONCAT(emp.first_name, ' ', emp.last_name) full_name, max(salary)
FROM employees emp
	INNER JOIN (
	SELECT emp_no, MAX(salary), salary
FROM salaries
GROUP BY emp_no) max_sal
	ON max_sal.emp_no = emp.emp_no
	INNER JOIN dept_emp dp_e
	ON dp_e.emp_no = emp.emp_no
	INNER JOIN departments dp
	ON dp.dept_no = dp_e.dept_no
GROUP BY dp.dept_name
ORDER BY MAX(salary) DESC;

SELECT CONCAT(first_name, ' ', last_name) full_name, hire_date,
	(case DAYOFWEEK(hire_date)
		when '1' then '일요일'
		when '2' then '월요일'
		when '3' then '화요일'
		when '4' then '수요일'
		when '5' then '목요일'
		when '6' then '금요일'
		when '7' then '토요일'
	END) day_of_week
FROM employees;

SELECT dp.dept_name, CONCAT(emp.first_name, ' ', emp.last_name) full_name, emp.hire_date
FROM (
	SELECT emp_no, first_name, last_name, MIN(hire_date), hire_date
	FROM employees
	GROUP BY emp_no) emp
	INNER JOIN dept_emp dp_e
	ON emp.emp_no = dp_e.emp_no
	INNER JOIN departments dp
	ON dp_e.dept_no = dp.dept_no
GROUP BY dp.dept_name;

SELECT CONCAT(emp.first_name, ' ', emp.last_name) full_name, title, emp.hire_date
FROM employees emp
	INNER JOIN titles tit
	ON emp.emp_no = tit.emp_no
	AND tit.title = 'Senior Engineer'
	AND (
	SELECT MIN(hire_date)
	FROM employees)
ORDER BY emp.hire_date ASC ;