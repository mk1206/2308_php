-- 1. 사원 정보테이블에 각자의 정보
INSERT INTO employees (
	emp_no
	, birth_date
	, first_name
	, last_name
	, gender
	, hire_date)
VALUES (
	500001
	, 20011206
	, 'Mingyeong'
	, 'Park'
	, 'F'
	, 20230907);
	
-- 2. 월급, 직책, 소속부서 테이블에 각자의 정보
INSERT INTO titles (
	emp_no
	, title
	, from_date
	, to_date)
VALUES (
	500001
	, 'CEO'
	, 19990101
	, 20200101);
	
INSERT INTO salaries (
	emp_no
	, salary
	, From_date
	, to_date)
VALUES (
	500001
	, 87000000
	, 20000101
	, 20201111);

INSERT INTO dept_emp 
	values(
	500001
	, 'd001'
	, 20001125
	, 20150606);
-- 3. 짝궁의 1, 2 넣으삼
INSERT INTO employees (
	emp_no
	, birth_date
	, first_name
	, last_name
	, gender
	, hire_date)
VALUES (
	500002
	, 19961203
	, 'Jiwoong'
	, 'Kim'
	, 'M'
	, 20201203);
	
INSERT INTO titles (
	emp_no
	, title
	, from_date
	, to_date)
VALUES (
	500002
	, 'Staff'
	, 19990101
	, 20200101);
	
INSERT INTO salaries (
	emp_no
	, salary
	, From_date
	, to_date)
VALUES (
	500002
	, 50000
	, 20000101
	, 20201111);

INSERT INTO dept_emp 
	values(
	500002
	, 'd001'
	, 20001125
	, 20150606);
-- 4. 나와 짝궁의 소속 부서를 d009로 변경
UPDATE dept_emp
SET to_date = NOW()
WHERE emp_no = 500002 AND dept_no = 'd001';

INSERT INTO dept_emp(
	emp_no
	, dept_no
	, from_date
	, to_date)
VALUES(
	500002
	, 'd009'
	, NOW()
	, 99990101);

-- 5. 짝궁의 모든 정보를 삭제
DELETE FROM employees
WHERE emp_no = 500002;

-- 6. 'd009'부서의 관리자를 나로 변경
DELETE FROM dept_manager
WHERE emp_no = 111939;

INSERT INTO dept_manager
	VALUES(
	'd009'
	, 500001
	, 20230907
	, 99990101);

-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경
UPDATE titles
SET title = 'Senior Engineer'
SET from_date = DATE(NOW())
WHERE emp_no = 500001;

-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력
SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name), sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND (
			sal.salary = (SELECT salary FROM salaries ORDER BY salary LIMIT 1)
			or
			sal.salary = (SELECT salary FROM salaries ORDER BY salary DESC LIMIT 1)
		);

SELECT emp.emp_no
	, CONCAT(emp.first_name, ' ', emp.last_name) full_name
	, sal.salary
	FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE sal.salary = (SELECT MAX(salary) FROM salaries)
OR sal.salary = (SELECT MIN(salary) FROM salaries);

CREATE INDEX idx_test ON salaries(salary);

-- 9. 전체 사원의 평균 연봉
SELECT AVG(salary) FROM salaries WHERE to_date >= NOW();

SELECT emp.emp_no, AVG(sal.salary)
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
GROUP BY salary;

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력
SELECT AVG(salary) FROM salaries WHERE emp_no = 499975;

SELECT emp.emp_no, AVG(sal.salary)
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	AND emp.emp_no = 499975
	AND sal.to_date <= DATE(NOW());