-- 직책테이블의 모든 정보
SELECT *
FROM titles;
-- 급여가 60,000 이하인 사원의 사번
SELECT emp_no
FROM salaries
WHERE salary <= 60000;
-- 급여가 60,000 ~ 70,000인 사원의 사번
SELECT emp_no
FROM salaries
WHERE salary BETWEEN 60000 AND 70000;
-- 사원번호가 10001, 10005인 사원의 모든 정보
SELECT *
FROM employees
WHERE emp_no IN(10001, 10005);
-- 직급명에 "Engineer"가 포함된 사원의 사번과 직급
SELECT emp_no, title
FROM titles
WHERE title LIKE('%Engineer%');
-- 사원 이름을 오름차순으로 정렬
SELECT first_name
FROM employees
ORDER BY first_name ASC;
-- 사원별 급여의  평균
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no;
-- 사원별 급여의 평균이 30,000 ~ 50,000인, 사원번호와 평균급여 조회
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no
	HAVING AVG(salary) BETWEEN 30000 AND 50000;
-- 사원별 급여 평균이 70,000 이상인 사원의 사번, 이름, 성, 성별을 조회
SELECT emp.emp_no, emp.first_name, emp.last_name, emp.gender
FROM employees AS emp
WHERE emp.emp_no IN (
	SELECT sal.emp_no
	FROM salaries AS sal
	GROUP BY emp_no
		HAVING AVG(sal.salary) >= 70000);
-- 현재 직책이 "Senior Engineer"인 사원의 사원번호와 성을 조회
SELECT emp.emp_no, emp.last_name
FROM employees AS emp
WHERE emp.emp_no IN (
	SELECT tit.emp_no
	FROM titles AS tit
	WHERE tit.to_date >= NOW()
	AND tit.title = 'Senior Engineer');