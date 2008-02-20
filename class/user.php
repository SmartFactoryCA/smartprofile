<?php
include_once(XOOPS_ROOT_PATH."/kernel/user.php");

/**
 * @package kernel
 * @copyright copyright &copy; 2000 XOOPS.org
 */
class SmartProfileUserHandler extends XoopsUserHandler {

    function getObjects($criteria = null, $id_as_key = false)
    {
        $fields = array('us.uid', 'name', 'uname', 'email', 'url', 'user_avatar', 'user_regdate', 'user_icq', 'user_from', 'user_sig','user_viewemail',
						'actkey', 'user_aim', 'user_yim', 'user_msnm', 'pass', 'posts', 'attachsig', 'rank', 'level', 'theme', 'timezone_offset',
						'last_login', 'umode', 'uorder', 'notify_method', 'notify_mode', 'user_occ', 'bio', 'user_intrest', 'user_mailok');
        $ret = array();
        $limit = $start = 0;
        $sql = 'SELECT DISTINCT '.implode(', ', $fields).' FROM '.$this->db->prefix('users').' as us LEFT JOIN '.$this->db->prefix('groups_users_link').' as gr ON ' .
        		'us.uid = gr.uid';
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $sql .= ' '.$criteria->renderWhere();
            if ($criteria->getSort() != '') {
                $sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
            }
            $limit = $criteria->getLimit();
            $start = $criteria->getStart();
        }
        $result = $this->db->query($sql, $limit, $start);
        if (!$result) {
            return $ret;
        }
        while ($myrow = $this->db->fetchArray($result)) {
            $user = new XoopsUser();
            $user->assignVars($myrow);
            if (!$id_as_key) {
                $ret[] =& $user;
            } else {
                $ret[$myrow['uid']] =& $user;
            }
            unset($user);
        }
        return $ret;
    }

    /**
     * count users matching a condition
     *
     * @param object $criteria {@link CriteriaElement} to match
     * @return int count of users
     */
    function getCount($criteria = null)
    {
        $sql = 'SELECT COUNT(uid) FROM (SELECT DISTINCT us.uid FROM '.$this->db->prefix('users').' as us LEFT JOIN '.$this->db->prefix('groups_users_link').' as gr ON ' .
        		'us.uid = gr.uid ';
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $sql .= ' '.$criteria->renderWhere();
        }
        $sql .= ') as uids';
        $result = $this->db->query($sql);
        if (!$result) {
            return 0;
        }
        list($count) = $this->db->fetchRow($result);
        return $count;
    }
}
?>
