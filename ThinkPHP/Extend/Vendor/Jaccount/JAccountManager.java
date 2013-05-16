package edu.sjtu.jaccount;

import java.util.*;
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

/**
 * Insert the type's description here.
 * Creation date: (2003-12-3 9:08:55)
 * @author: Administrator
 */
public final class JAccountManager {
	private java.lang.String uaBaseURL = "http://jaccount.sjtu.edu.cn/jaccount/";
//	private java.lang.String uaBaseURL = "http://202.112.26.68:8080/jaccount/";
	private java.lang.String siteID;
	public boolean hasTicketInURL;
	protected java.util.Hashtable userProfile;
	private static long elapsedTimestamp = 0;
	private java.lang.String ticketFromServer;
	private java.lang.String returnURL;
	private byte[] siteKey = null;
/**
 * JAccountManager constructor comment.
 */
public JAccountManager(String sid, String keyDir) {
	super();
	siteID = sid;

	try {
		String sep = System.getProperty("file.separator");
		String keyFile = keyDir + sep + "jakey" + sep + sid.toLowerCase() + "_desede.key";
		FileInputStream fis = new FileInputStream(keyFile);
		byte[] key = new byte[24];
		int c;
		while ( (c = fis.read(key)) != -1) {
			if (c == 24) {
				siteKey = key;
			}
		}
		fis.close();
	} catch (Exception e) {
	}

}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-3 10:14:32)
 * @param request javax.servlet.http.HttpServletRequest
 * @param response javax.servlet.http.HttpServletResponse
 * @param session javax.servlet.http.HttpSession
 * @param returnURL java.lang.String
 */
public Hashtable checkLogin(HttpServletRequest request, HttpServletResponse response, HttpSession session, String returnURL) {
	if (hasValidTicket(request, session)) {
		setSiteCookie(response);
		hasTicketInURL = true;
		return userProfile;
	} else {
		if (isSiteCookieValid(request)) {
			return userProfile;
		} else {
			hasTicketInURL = false;
			try {
				String scheme = request.getScheme();
				int port = request.getServerPort();
				String rurl = scheme + "://" + request.getServerName();
				if (! ( (scheme.equals("http") && port == 80) || (scheme.equals("https") && port == 443) ) ) {
					rurl = rurl + ":" + port;
				}
				rurl = rurl + returnURL;
				response.sendRedirect(uaBaseURL + "jalogin?sid=" + siteID + "&returl=" + encrypt(rurl) + "&se=" + encrypt(session.getId()));
			} catch (IOException ioe) {
			}
			return null;
		}
	}
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-4 10:00:28)
 * @return java.lang.String
 * @param src java.lang.String
 */
protected String decrypt(String src) {
	if (siteKey == null) return null;
	return (new JACrypt()).tripleDESDecrypt(src, siteKey);
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-4 10:00:54)
 * @return java.lang.String
 * @param src java.lang.String
 */
protected String encrypt(String src) {
	if (siteKey == null) return null;
	return (new JACrypt()).tripleDESEncrypt(src, siteKey, true);
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-4 9:30:43)
 * @return boolean
 * @param request javax.servlet.http.HttpServletRequest
 */
protected boolean hasValidTicket(HttpServletRequest request, HttpSession session) {
	String ticket = request.getParameter("jatkt");
	if (ticket == null || ticket.length() == 0) return false;
	String decry = decrypt(ticket);
	userProfile = parseUserProfile(decry);
	if (userProfile == null) return false;
	else {
		String ses = (String)userProfile.get("ja3rdpartySessionID");
		if (ses == null || !ses.equals(session.getId()))
			return false;
		String ts = (String)userProfile.get("jaThisLoginTime");
		try {
			Long timestamp = new Long(ts);
			if (isTimestampValid(timestamp)) {
				ticketFromServer = ticket;
				returnURL = (String)userProfile.get("jaReturnUrl");
				return true;
			}
			else return false;
		} catch (NumberFormatException nfe) {
			return false;
		}
	}
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-3 15:46:31)
 * @return boolean
 * @param request javax.servlet.http.HttpServletRequest
 */
protected boolean isSiteCookieValid(HttpServletRequest request) {
	Cookie cks[] = request.getCookies();
	String siteCookieValue = new String();
	for (int i = 0; cks != null && i < cks.length; i++) {
		if (cks[i].getName() != null && cks[i].getName().compareTo("JASiteCookie") == 0) {
			siteCookieValue = cks[i].getValue();
			siteCookieValue = decrypt(siteCookieValue);
			if (siteCookieValue == null) return false;
			userProfile = parseUserProfile(siteCookieValue);
			if (userProfile == null) return false;
			else {
				return true;
			}
		}
	}
	return false;
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-4 10:03:55)
 * @return boolean
 * @param timestamp java.lang.Long
 */
protected synchronized static boolean isTimestampValid(Long timestamp) {
	long ts = timestamp.longValue();
	boolean valid = false;
	if (ts > elapsedTimestamp) {
		valid = true;
		elapsedTimestamp = ts;
	}
	return valid;
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-19 13:43:38)
 * @param response javax.servlet.http.HttpServletResponse
 * @param returnURL java.lang.String
 */
public boolean logout(HttpServletRequest request, HttpServletResponse response, String returnURL) {
	try {
		String lo = request.getParameter("logout");
		if (lo != null && lo.equals("1")) {
			return true;
		}
		Cookie ck = new Cookie("JASiteCookie", "");
		ck.setMaxAge(0);
		response.addCookie(ck);
		
		String scheme = request.getScheme();
		int port = request.getServerPort();
		String rurl = scheme + "://" + request.getServerName();
		if (! ( (scheme.equals("http") && port == 80) || (scheme.equals("https") && port == 443) ) ) {
			rurl = rurl + ":" + port;
		}
		rurl = rurl + returnURL;
		response.sendRedirect(uaBaseURL + "ulogout?sid=" + siteID + "&returl=" +encrypt(rurl));
		return false;
	} catch (Exception e) {
	}
	return false;
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-4 10:01:53)
 * @return java.util.Hashtable
 * @param ticket java.lang.String
 */
protected Hashtable parseUserProfile(String ticket) {
	if (ticket == null) return null;
	Hashtable ret = new Hashtable(10);
	StringTokenizer st = new StringTokenizer(ticket, "\n");
	int seq = 1;
	while (st.hasMoreTokens()) {
		String token = st.nextToken();
		int idx = token.indexOf("=");
		if (idx != -1) {
			String name = token.substring(0, idx);
			String value = token.substring(idx + 1);
			if (name == null || (seq == 1 && !name.equals("jaThisLoginTime")) || (seq == 2 && !name.equals("jaLastLoginTime"))) {
				ret = null;
				break;
			}
			seq++;
			ret.put(name, value);
		}
	}
	return ret;
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-8 9:48:21)
 * @param response javax.servlet.http.HttpServletResponse
 */
public void redirectWithoutTicket(HttpServletResponse response) {
	try {
		response.sendRedirect(returnURL);
	} catch (IOException ioe) {
	}
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-4 9:31:15)
 * @param response javax.servlet.http.HttpServletResponse
 */
protected void setSiteCookie(HttpServletResponse response) {
	Cookie ck = new Cookie("JASiteCookie", ticketFromServer);
	ck.setMaxAge(-1);
	response.addCookie(ck);
}
}
