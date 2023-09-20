
INSERT INTO employees
VALUES (
	800000
	, 20000101
	, 'hello'
	, 'php'
	, 'M'
	, 20230919
);

-- SELECT *
-- FROM employees
-- WHERE emp_no
-- NOT IN(SELECT emp_no FROM titles);

-- INSERT INTO titles
-- VALUES (
-- 	700000
-- 	, 'green'
-- 	, date(NOW())
-- 	, 99990101);
	
SELECT * 
FROM titles
WHERE emp_no > 500000;
-- 
DELETE FROM titles
WHERE emp_no > 500000;

FLUSH PRIVILEGES


SELECT *
FROM employees emp
WHERE NOT EXISTS(
	SELECT 1
	FROM titles tit
	WHERE emp.emp_no = tit.emp_no );
	
SELECT emp.emp_no, tit.emp_no
FROM employees emp
	LEFT JOIN titles tit
	ON emp.emp_no = tit.emp_no
WHERE tit.emp_no IS NULL;
	
	