-- 1. auto_increment
-- 	자동 증가 값을 가지는 컬럼으로, 값을 직접 대입 x
-- 	중간에 값을 삭제한다고 해서, 삭제된 값을 제사용 하지 않으며
-- 	레코드가 적재될 때마다 1씩 증가
-- PK에만 적용 가능

--  2. auto_increment 생성
CREATE TABLE 테이블명 (
	mem_no	INT(11) PRIMARY KEY AUTO_INCREMENT
	, mem_name VARCHAR(50)
);

-- 3. auto_increment 수정
-- 	이미 생성한 테이블의 컬럼에 추가할 때
ALTER TABLE 테이블명 MODIFY 컬럼명 INT(11) PRIMARY KEY AUTO_INCREMENT;

-- auto_increment의 값을 초기화 할 때 특정값으로 설정(현재 PK의 최대값 이하로는 설정 안 됨)
ALTER TABLE 테이블명 AUTO_INCREMENT=10;

