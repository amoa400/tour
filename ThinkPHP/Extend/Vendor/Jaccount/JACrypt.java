package edu.sjtu.jaccount;

import java.io.*;
import java.security.*;
import javax.crypto.*;
import javax.crypto.spec.*;
import org.w3c.tools.codec.*;

/**
 * Insert the type's description here.
 * Creation date: (2003-12-8 15:47:25)
 * @author: Administrator
 */
public class JACrypt {
/**
 * JACrypt constructor comment.
 */
public JACrypt() {
	super();
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-8 15:49:59)
 * @return byte[]
 * @param src byte[]
 * @param key byte[]
 */
public byte[] tripleDESDecrypt(byte[] src, byte[] rawKeyData) {
	try {
	    DESedeKeySpec dks = new DESedeKeySpec( rawKeyData );

		SecureRandom sr = new SecureRandom();
	    SecretKeyFactory keyFactory = SecretKeyFactory.getInstance( "DESede" );
	    SecretKey key = keyFactory.generateSecret( dks );
	    Cipher cipher = Cipher.getInstance( "DESede/CBC/PKCS5Padding" );
	    byte ivLength = src[0];
	    byte[] iv = new byte[ivLength];
	    for (int i = 0; i < ivLength; i++) {
		    iv[i] = src[i + 1];
	    }
	    IvParameterSpec ivp = new IvParameterSpec(iv);
		cipher.init( Cipher.DECRYPT_MODE, key, ivp);
	    byte decryptedData[] = cipher.doFinal( src , ivLength + 1, src.length - ivLength - 1);
		
		return decryptedData;
	} catch (Exception e) {
		return null;
	}
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-8 15:57:25)
 * @return java.lang.String
 * @param src java.lang.String
 * @param key byte[]
 */
public String tripleDESDecrypt(String src, byte[] key) {
	if (src == null) return null;
	try {
		ByteArrayOutputStream bo = new ByteArrayOutputStream(20);
		(new Base64Decoder(new ByteArrayInputStream(src.getBytes()), bo)).process();
		byte[] ta = bo.toByteArray();

		byte[] decryptedData = tripleDESDecrypt(ta, key);
		if (decryptedData != null) {
			String ret = null;
			try {
				ret = new String(decryptedData, "UTF8");
			} catch(Exception e) {
			}
			return ret;
		} else {
			return null;
		}
	} catch (Exception e) {
		return null;
	}
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-8 15:48:53)
 * @return byte[]
 * @param src byte[]
 * @param key byte[]
 */
public byte[] tripleDESEncrypt(byte[] src, byte[] rawKeyData) {
	try {
	    DESedeKeySpec dks = new DESedeKeySpec( rawKeyData );

	    SecretKeyFactory keyFactory = SecretKeyFactory.getInstance( "DESede" );
	    SecretKey key = keyFactory.generateSecret( dks );
	    Cipher cipher = Cipher.getInstance( "DESede/CBC/PKCS5Padding" );
		cipher.init( Cipher.ENCRYPT_MODE, key);
		byte iv[] = cipher.getIV();
	    byte encryptedData[] = cipher.doFinal( src );

	    byte ret[] = new byte[1 + iv.length + encryptedData.length];
	    ret[0] = (byte)iv.length;
	    for (int i = 1; i < ret.length; i++) {
		    if (i <= iv.length)
			    ret[i] = iv[i - 1];
			else ret[i] = encryptedData[i - iv.length - 1];
	    }
		
		return ret;
	} catch (Exception e) {
		return null;
	}
}
/**
 * Insert the method's description here.
 * Creation date: (2003-12-8 15:57:47)
 * @return java.lang.String
 * @param src java.lang.String
 * @param key byte[]
 */
public String tripleDESEncrypt(String src, byte[] key, boolean encodedForUrl) {
	if (src == null) return null;
	byte[] sb = null;
	try {
		sb = src.getBytes("UTF8");
	} catch (Exception e) {
	}
	byte encryptedData[] = tripleDESEncrypt(sb, key);
	if (encryptedData != null) {
		try {
			ByteArrayOutputStream bo = new ByteArrayOutputStream(20);
			(new Base64Encoder(new ByteArrayInputStream(encryptedData), bo)).process();
			byte[] ta = bo.toByteArray();
			int j = 0;
			for (int i = 0; i < ta.length; i++) {
				if (ta[i] != 0x0a) {
					ta[j] = ta[i];
					j++;
				}
			}

			if (encodedForUrl) {
				String cont = new String();
				String ts = new String();
				for (int i = 0; i < j; i++) {
					ts = (Integer.toHexString((int)(ta[i])));
					if (ts.length() == 1) ts = "0" + ts;
					cont = cont + "%" + ts.substring(ts.length() - 2);
				}
				return cont;
			} else {
				return new String(ta, 0, j);
			}
		} catch (Exception e) {
			return null;
		}
	} else {
		return null;
	}
}
}
