-- INSERT
-- INSERT INTO 테이블명 [ (속성1, 속성2) ]
-- VALUES (속성값1, 속성값2)

-- 500,000 신규 회원
INSERT INTO employees (
	emp_no
	, birth_date	
	, first_name
	, last_name
	, gender
	, hire_date)
VALUES (
	500002
	, 20011206
	, 'Meerkat'
	, 'Green'
	, 'M'
	, 20230904);
	
SELECT * FROM employees WHERE emp_no >= 500000;

-- 500,000번 사원의 급여 데이터를 삽입
INSERT INTO salaries (
	emp_no
	, salary
	, from_date
	, to_date)
VALUES (
	500000
	, 2
	, 20000904
	, 99990101);

SELECT * FROM salaries WHERE emp_no >= 500000;

-- 500,000번 사원의 소속 부서 데이터를 삽입
INSERT INTO dept_emp (
	emp_no
	, dept_no
	, from_date
	, to_date)
VALUES (
	500000
	, 'd001'
	, 20160908
	, 99990101);
	
SELECT * FROM dept_emp WHERE emp_no = 500000;

-- 500,000번 사원의 직책 데이터를 삽입
INSERT INTO titles (
	emp_no
	, title
	, from_date
	, to_date)
VALUES (
	500000
	, 'Staff'
	, 20201106
	, 99990101);
	
SELECT * FROM titles WHERE emp_no = 500000;

SHOW VARIABLES LIKE 'autocommit%';