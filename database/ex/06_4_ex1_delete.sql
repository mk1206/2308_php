-- DELETE의 기본구조
-- DELETE FROM 테이블명
-- WHERE 조건
-- ** 추가 설명 : 조건을 적지 않을 경우 모든 레코드가 삭제됩니다.
-- 				실수를 방지하기 위해 WHERE절을 먼저 작성

DELETE FROM departments
WHERE dept_no = 'd010';

SELECT * FROM departments;

-- 사원 정보 테이블에서 사원번호가 500001 이상인 사원의 데이터를 삭제
DELETE FROM employees
WHERE emp_no >= 500001;

SELECT * FROM employees
ORDER BY emp_no DESC;